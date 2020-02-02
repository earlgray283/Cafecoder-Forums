package main

import (
	"bufio"
	"encoding/json"
	"fmt"
	"io"
	"os"
	"os/exec"
	"regexp"
	"strings"
	"time"
)

type testcaseT struct {
	Name   string `json:"name"`
	Result string `json:"result"`
	Time   int64  `json:"time"`
	Memory int64  `json:"memory"`
}

type resultT struct {
	Testcase  [10]testcaseT `json:"testcase"`
	TestcaseN int           `json:"testcaseN"`
	Status    string        `json:"status"`
	MaxTime   int64         `json:"maxTime"`
	SessionID string        `json:"sessionid"`
}

type submitinfoT struct {
	SessionID      string `json:"sessionid"`
	Language       string `json:"language"`
	TestcasePath   string `json:"testcasePath"`
	SourcecodePath string `json:"sourcecodePath"`

	extension  string
	compileCmd string
	executeCmd string
}

func checkRegexp(reg, str string) bool {
	return regexp.MustCompile(reg).Match([]byte(str))
}

func setResult(status string, message string) {

}

func judge(bytes []byte) {
	var (
		submitinfo submitinfoT
		result     resultT
	)
	priority := map[string]int{"AC": 0, "WA": 1, "TLE": 2, "RE": 3, "CE": 4, "IE": 5}

	err := json.Unmarshal(bytes, &submitinfo)
	if err != nil {
		fmt.Fprintf(os.Stderr, "unmarshal error\n")
		return
	}

	if !validationChack(submitinfo) {
		result.Status = "IE"
		fmt.Fprintf(os.Stderr, "validationChack error\n")
		return
	}
	setLanguage(&submitinfo)

	err = os.MkdirAll("tmp/"+submitinfo.SessionID, 0777)
	if err != nil {
		fmt.Fprintf(os.Stderr, "%s", err.Error())
	}
	defer os.RemoveAll("tmp/" + submitinfo.SessionID)
	err = exec.Command("cp", submitinfo.SourcecodePath, "tmp/"+submitinfo.SessionID+"/Main"+submitinfo.extension).Run()

	err = compile(submitinfo)
	if err != nil {
		fmt.Fprintf(os.Stderr, "compile error\n")
		result.Status = "CE"
	}

	err = tryTestcase(submitinfo, &result)
	if err != nil {
		result.Status = "IE"
	}

	for i := 0; i < result.TestcaseN; i++ {
		if result.MaxTime < result.Testcase[i].Time {
			result.MaxTime = result.Testcase[i].Time
		}
		if priority[result.Status] < priority[result.Testcase[i].Result] {
			result.Status = result.Testcase[i].Result
		}
	}
	x, _ := json.Marshal(result)
	println(string(x))

}

func tryTestcase(submitinfo submitinfoT, result *resultT) error {
	var testcaseName [100]string

	testcaseList, err := os.Open(submitinfo.TestcasePath + "/testcase_list.txt")
	if err != nil {
		return err
	}

	sc := bufio.NewScanner(testcaseList)
	for sc.Scan() {
		testcaseName[result.TestcaseN] = sc.Text()
		result.TestcaseN++
	}
	testcaseList.Close()

	for i := 0; i < result.TestcaseN; i++ {
		result.Testcase[i].Name = strings.TrimSpace(testcaseName[i])
		start := time.Now().UnixNano()
		err = exec.Command("sh", "-c", submitinfo.executeCmd+" < "+submitinfo.TestcasePath+"/in/"+testcaseName[i]+" > tmp/"+submitinfo.SessionID+"/stdout.txt 2> tmp/"+submitinfo.SessionID+"/stderr.txt").Run()
		end := time.Now().UnixNano()
		result.Testcase[i].Time = (end - start) / int64(time.Millisecond)
		if err != nil {
			result.Testcase[i].Result = "RE"
			continue
		}
		if result.Testcase[i].Time > 2000 {
			result.Testcase[i].Result = "TLE"
			break
		}

		testcaseOutput, err := os.Open(submitinfo.TestcasePath + "/out/" + result.Testcase[i].Name)
		if err != nil {
			result.Testcase[i].Result = "IE"
			return err
		}
		userOutput, err := os.Open("tmp/" + submitinfo.SessionID + "/stdout.txt")
		if err != nil {
			result.Testcase[i].Result = "IE"
			return err
		}
		reader1 := bufio.NewReaderSize(testcaseOutput, 8192)
		reader2 := bufio.NewReaderSize(userOutput, 8192)
		for {
			line1, _, err := reader1.ReadLine()
			if err == io.EOF {
				break
			}
			line2, _, err := reader2.ReadLine()
			if err == io.EOF {
				break
			}
			if string(line1) != string(line2) {
				println(string(line1) + "," + string(line2))
				result.Testcase[i].Result = "WA"
			}
		}
		if result.Testcase[i].Result != "WA" {
			result.Testcase[i].Result = "AC"
		}

		testcaseOutput.Close()
		userOutput.Close()
	}
	return nil
}

func setLanguage(submitinfo *submitinfoT) {
	if submitinfo.Language == "c11" {
		submitinfo.extension = ".c"
		submitinfo.compileCmd = "gcc tmp/" + submitinfo.SessionID + "/Main" + submitinfo.extension + " -std=gnu11 -o tmp/" + submitinfo.SessionID + "/Main.out"
		submitinfo.executeCmd = "./tmp/" + submitinfo.SessionID + "/Main.out"
	} else if submitinfo.Language == "cpp17" {
		submitinfo.extension = ".cpp"
		submitinfo.compileCmd = "g++ tmp/" + submitinfo.SessionID + "/Main" + submitinfo.extension + " -std=gnu++17 -o tmp/" + submitinfo.SessionID + "/Main.out"
		submitinfo.executeCmd = "./tmp/" + submitinfo.SessionID + "/Main.out"
	} else if submitinfo.Language == "cpp20" {
		submitinfo.extension = ".cpp"
		submitinfo.compileCmd = "g++ tmp/" + submitinfo.SessionID + "/Main" + submitinfo.extension + " -std=gnu++2a -o tmp/" + submitinfo.SessionID + "/Main.out"
		submitinfo.executeCmd = "./tmp/" + submitinfo.SessionID + "/Main.out"
	} else if submitinfo.Language == "java11" {
		submitinfo.extension = ".java"
		submitinfo.compileCmd = "javac tmp/" + submitinfo.SessionID + "/Main" + submitinfo.extension + " -d " + "tmp/" + submitinfo.SessionID
	} else if submitinfo.Language == "python3" {
		submitinfo.extension = ".py"
		submitinfo.compileCmd = "python3 -m py_compile tmp/" + submitinfo.SessionID + "/Main" + submitinfo.extension
	}
}
func compile(submitinfo submitinfoT) error {
	println(submitinfo.compileCmd)
	err := exec.Command("sh", "-c", submitinfo.compileCmd).Run()
	return err
}

func validationChack(submitinfo submitinfoT) bool {
	if !checkRegexp(`[(A-Za-z0-9\./_\/)]*`, submitinfo.SessionID) {
		return false
	}
	if !checkRegexp(`[(A-Za-z0-9\./_\/)]*`, submitinfo.Language) {
		return false
	}
	if !checkRegexp(`[(A-Za-z0-9\./_\/)]*`, submitinfo.TestcasePath) {
		return false
	}
	if !checkRegexp(`[(A-Za-z0-9\./_\/)]*`, submitinfo.SourcecodePath) {
		return false
	}
	return true
}

func main() {
	var sc = bufio.NewScanner(os.Stdin)
	for {
		sc.Scan()
		bytes := sc.Bytes()
		go judge(bytes)
	}

}

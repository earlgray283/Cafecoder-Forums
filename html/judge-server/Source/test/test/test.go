package main

import "encoding/json"

type submitinfoT struct {
	SessionID      string `json:"sessionid"`
	Language       string `json:"language"`
	TestcasePath   string `json:"testcasePath"`
	SourcecodePath string `json:"sourcecodePath"`
}

func main() {
	var submitinfo submitinfoT
	submitinfo.SessionID = "earlgray283"
	submitinfo.Language = "c11"
	submitinfo.TestcasePath = "/var/www/html/judge-server/Source/test/testcase"
	submitinfo.SourcecodePath = "/var/www/html/judge-server/Source/test/test.c"

	out, _ := json.Marshal(submitinfo)
	println(string(out))
}

<?php
include_once "db_connect.php";
$category = array(
    "1000" => "C",
    "1001" => "C++",
    "1002" => "Java",
    "1003" => "Python3",
    "1004" => "Scratch",
);
function echo_forum($value, $issmall)
{
    $category = array(
        "1000" => "C",
        "1001" => "C++",
        "1002" => "Java",
        "1003" => "Python3",
        "1004" => "Scratch",
    );

    echo '<div class="card">' . "\n";
    echo ' <div class="card-body">' . "\n";
    echo ' <h2 class="card-title"><strong>' . $value["title"] . '</strong></h2>' . "\n"; //question-title
    $forum_id = $value["forum_id"];
    echo ' <p>ユーザー - ' . $value["author"] . '　　' . '分野 - ' . $category["$forum_id"] . '　　' . '投稿日時 - ' . $value["date"] . '</p>' . "\n"; //question-author&date
    echo '<hr>' . "\n";

    echo $value["detail"] . "\n";

    echo '<hr>' . "\n";
    if ($issmall == true) {
        echo '<a href="que_detail.php?question_id=' . $value["id"] . '"><button type="button" class="btn btn-primary">詳細</button></a>';
    }

    echo ' </div>' . "\n";
    echo '</div>' . "\n";
    echo '<br>';
}

function echo_answer($value)
{
    echo '<div class="card">' . "\n";
    echo ' <div class="card-body">' . "\n";
    echo ' <p>author - ' . $value["author"] . '　　　date - ' . $value["date"] . '</p>' . "\n"; //question-author&date

    /*
    echo '<p style="background-color:#f0ad4e;color:white;border-radius: 10px;padding: 0.5em 1.1em;width:3.5em;">TLE</a>';
     */
    echo '<hr>' . "\n";
    echo $value["detail"] . "\n"; //question-detail

    echo ' </div>' . "\n";
    echo '</div>' . "\n";
    echo '<br>';
}

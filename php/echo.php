<?php
function echo_forum($value, $issmall)
{
    echo '<div class="card">' . "\n";
    echo ' <div class="card-body">' . "\n";
    echo ' <h2 class="card-title"><strong>' . $value["title"] . '</strong></h2>' . "\n"; //question-title
    echo ' <p>author - ' . $value["author"] . '　　' . 'category - todoコンテストIDなど' . '　　' . 'date - ' . $value["date"] . '</p>' . "\n"; //question-author&date

    if ($value["status"] == "AC") {
        echo '<p style="background-color:#5cb85c;color:white;border-radius: 10px;padding: 0.5em 1.25em;width:3.75em;">AC</a>';
    } else if ($value["status"] == "WJ") {
        echo '<p style="background-color:#777;color:white;border-radius: 10px;padding: 0.5em 1.2em;width:3.75em;">WJ</a>';
    }
    /*

echo '<p style="background-color:#f0ad4e;color:white;border-radius: 10px;padding: 0.5em 1.1em;width:3.5em;">TLE</a>';
    */
    echo '<hr>' . "\n";

    if ($issmall == true) {
        echo $value["detail"] . "\n"; //question-detail
    } else {
        echo substr($value["detail"], 0, 100) . "\n"; //question-detail
    }

    echo '<hr>' . "\n";
    if ($issmall == true) {
        echo '<a href="questions.php?question_id=' . $value["id"] . '"><button type="button" class="btn btn-primary">詳細</button></a>';
    }

    echo ' </div>' . "\n";
    echo '</div>' . "\n";
    echo '<br>';
}

function echo_answer($value)
{
    echo '<div class="card">' . "\n";
    echo ' <div class="card-body">' . "\n";
    echo ' <p>author - ' . $value["author"] .  '　　　date - ' . $value["date"] . '</p>' . "\n"; //question-author&date

    /*
echo '<p style="background-color:#f0ad4e;color:white;border-radius: 10px;padding: 0.5em 1.1em;width:3.5em;">TLE</a>';
    */
    echo '<hr>' . "\n";
    echo $value["detail"] . "\n"; //question-detail

    echo ' </div>' . "\n";
    echo '</div>' . "\n";
    echo '<br>';
}

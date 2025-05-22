<?php
include 'app/QuestionLists.php';

class Test {
    private $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function test() {
        $question_lists = new QuestionLists();
        try {
            $question_lists->parse($this->path);
            $q = $question_lists->getQuestion(1);
            echo "Question: " . $q->getQuestion() . "\n";
            echo "Answer: " . $q->getAnswer() . "\n";
        } catch (Exception $e) {
            echo "Message: " . $e->getMessage();
        }
    }
}

$test = new Test('questions.md');
$test->test();

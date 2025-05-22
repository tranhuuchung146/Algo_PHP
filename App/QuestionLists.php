<?php
include "Question.php";

class QuestionLists {
    private $questions = [];

    public function __construct($questions = []) {
        $this->questions = $questions;
    }

    public function parse($path) {
        if (!file_exists($path)) {
            throw new \Exception("File not found. Please check path: " . $path);
        }

        $file_content = file_get_contents($path);
        $question_list = explode('######', $file_content);
        array_shift($question_list); // bỏ phần đầu nếu không chứa câu hỏi

        foreach ($question_list as $item) {
            $answer = explode("####", $item);
            if (count($answer) >= 2) {
                $questionText = trim($answer[0]);
                $answerText = trim($answer[1]);
                $this->questions[] = new Question($questionText, $answerText);
            }
        }
    }

    public function all() {
        if (count($this->questions) === 0) {
            throw new Exception("Question list is empty!");
        }
        return $this->questions;
    }

    public function getQuestion($index) {
        if (!isset($this->questions[$index - 1])) {
            throw new Exception("Question not found or check your index.");
        }
        return $this->questions[$index - 1];
    }
}

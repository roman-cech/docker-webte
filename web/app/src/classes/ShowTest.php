<?php

namespace App\Classes;


class ShowTest {

    private $id;
    private $exam_code;
    private $title;
    private $time_limit;
    private $is_active;
    private $exam_points;

    /**
     * ShowTest constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getExamCode()
    {
        return $this->exam_code;
    }

    /**
     * @param mixed $exam_code
     */
    public function setExamCode($exam_code): void
    {
        $this->exam_code = $exam_code;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTimeLimit()
    {
        return $this->time_limit;
    }

    /**
     * @param mixed $time_limit
     */
    public function setTimeLimit($time_limit): void
    {
        $this->time_limit = $time_limit;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * @param mixed $is_active
     */
    public function setIsActive($is_active): void
    {
        $this->is_active = $is_active;
    }

    /**
     * @return mixed
     */
    public function getExamPoints()
    {
        return $this->exam_points;
    }

    /**
     * @param mixed $exam_points
     */
    public function setExamPoints($exam_points): void
    {
        $this->exam_points = $exam_points;
    }


    public function showTable(){
        return "
            <tr>
                <td>$this->exam_code</td>
                <td>$this->title</td>
                <td>$this->time_limit</td>
                <td>$this->exam_points</td>
                <td><div class='form-check form-switch'>
                  <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked$this->id'  onclick='changeValueTest()'>
                
                </div></td>
            </tr>
        
        ";
    }



}
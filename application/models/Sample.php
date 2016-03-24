<?php
// model
class Sample extends CI_Model {
     function get_all_courses()
     {
         return $this->db->query("SELECT * FROM courses")->result_array();
     }
     function get_course_by_id($course_id)
     {
         return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id))->row_array();
     }
     function add_course($course)
     {
         $query = "INSERT INTO Courses (title, description, created_at) VALUES (?,?,?)";
         $values = array($course['title'], $course['description'], date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
     }
}
// controller
class samples extends CI_Controller {
    public function show($id)
    {   
        $this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("Course"); //loads the model
        $course = $this->Course->get_course_by_id($id);  //calls the get_course_by_id method
        var_dump($course);
    }
    public function add()
    {
        $this->load->model("Course");
        $course_details = array(
            "title" => "JavaScript",
            "description" => "JavaScript Rocks!"
        ); 
        $add_course = $this->Course->add_course($course_details);
        if($add_course === TRUE) {
            echo "Course is added!";
        }
    }
}
?>
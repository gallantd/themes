<?php
class FAQ {
  public $type = 'faq';
  private function get_all(){
    $this->wpQuery = new WP_Query(array(
      'post_type' => $this->type,
      'posts_per_page' => -1,
      'post_status' => 'publish',
    )
  );
   return $this->wpQuery->posts;
  }
  public function show_all(){
      return $this->process($this->get_all());
  }
  private function process($faqsList){
   $faqs = [];
   foreach($faqsList as $key => $value){
     array_push($faqs, ['question' => $value->post_title, 'answer' => $value->post_content]);
   }
  return $faqs;
  }
}

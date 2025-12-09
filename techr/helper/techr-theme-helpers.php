<?php

class ThrHelper
{

   public function build_remove_href(array $post, string $post_name): string
   {

      $url = array_values(array_diff($post, [$post_name]));
      $compare_url = implode("-vs-", $url);

      return home_url("compare/" . $compare_url);
   }
}

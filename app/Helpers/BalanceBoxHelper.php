<?php
if (! function_exists('balance_total')) {
      function balance_total() {
        return DB::select("SELECT (sum(CASE WHEN status='in' THEN amount ELSE 0 END) - (sum(CASE WHEN status='out' THEN amount ELSE 0 END))) as total FROM balance_boxes;")[0]->total;
      }
    }
 ?>


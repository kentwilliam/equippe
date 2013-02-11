<?

function create_thumbnail($path2image,$path2thumb,$axis,$size) {
   $imageName = basename($path2image);
   $thumbName = basename($path2thumb);

   if (ereg("\.gif$",$imageName) || ereg("\.jpg",$imageName)) {
   
      $imageAttributes = GetImageSize($path2image);
   
      $imageWidth = $imageAttributes[0];
      $imageHeight = $imageAttributes[1];
    
      if ($imageWidth < $size && $imageHeight < $size) {
         @exec("cp $path2image $path2thumb");
         chmod($path2thumb, 0666);
      } else {
         if ($imageHeight > $imageWidth) {
            $psize="x$size";
         } else {
            $psize=$size;
         }
	$line="/usr/bin/convert -resize $psize $path2image $path2thumb";
         exec($line);
         chmod($path2thumb, 0666);
      }
   } else {
      return "error";
   }
} 

function save_userfile($file,$filename,$id,$table,$i) {
   global $cfg;

   if (eregi("jpg$",$filename)) {
      $filetype = "jpg";
   } elseif (eregi("gif$",$filename)) {
      $filetype = "gif";
   } else {
      return "Bildet må ha .jpg eller .gif endelse.";
   }



   @unlink($cfg[imagedir].$table."_".$id."_".$i."_normal.jpg");
   @unlink($cfg[imagedir].$table."_".$id."_".$i."_normal.gif");
   @unlink($cfg[imagedir].$table."_".$id."_".$i."_original.jpg");
   @unlink($cfg[imagedir].$table."_".$id."_".$i."_original.gif");
   @unlink($cfg[imagedir].$table."_".$id."_".$i."_thumb.jpg");
   @unlink($cfg[imagedir].$table."_".$id."_".$i."_thumb.gif");

   copy($file,$cfg[imagedir].$table."_".$id."_".$i."_original.$filetype");
   $image_size=getimagesize($file);
   $image_width=$image_size[0];
   $image_height=$image_size[1];
   
   if ($image_width>$cfg[image_thumb_size] || $image_height > $cfg[image_thumb_size]) {
      create_thumbnail($cfg[imagedir].$table."_".$id."_".$i."_original.$filetype",$cfg[imagedir].$table."_".$id."_".$i."_thumb.$filetype","a", $cfg[image_thumb_size]);
   } else {
      copy($file,$cfg[imagedir].$table."_".$id."_".$i."_thumb.$filetype");
   }
   if ($image_width>$cfg[image_normal_size] || $image_height > $cfg[image_normal_size]) {
      create_thumbnail($cfg[imagedir].$table."_".$id."_".$i."_original.$filetype",$cfg[imagedir].$table."_".$id."_".$i."_normal.$filetype","a", $cfg[image_normal_size]);
   } else {
      copy($file,$cfg[imagedir].$table."_".$id."_".$i."_normal.$filetype");
   }

   if ($table=="produkter" && $i==1) {
	   $query="UPDATE produkter SET bilde='$filetype' WHERE id='$id'";
	}
   if ($table=="produkter" && $i==2) {
	   $query="UPDATE produkter SET bilde2='$filetype' WHERE id='$id'";
	}
   if ($table=="produkter" && $i==3) {
	   $query="UPDATE produkter SET bilde3='$filetype' WHERE id='$id'";
	}
   mysql_query($query);
   
   $error = mysql_error();
   if ($error || (!$sql[original] && !$sql[normal] && !$sql[thumb])) {
      return "En feil har oppstatt under lagring av bilde. ($error)";
   } else {
      return "Bildet Lagret OK";
   }

}

function print_news() {
	global $cfg;
	
	$result=mysql_query("SELECT * FROM artikler WHERE kategori=".$cfg['news_group']." ORDER BY id DESC");
}


?>

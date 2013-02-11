<?php

class simple_db_admin {

	function draw($database,$table,$cfg="",$where="") {
		$this->pvars=$_POST;	
		$this->gvars=$_GET;
		$this->table=$table;
		$this->db=$database;
		$this->cfg=$cfg;
		if ($this->pvars[form]=="edit" || $this->gvars[form]=="edit") {
			$this->edit_row();
		} else {
			$this->print_table($where,$this->cfg[orderby][$this->table]);
		}
	}

	function print_table($where="",$order="") {
		if ($where) $where=" WHERE $where";
		if ($order) $order=" ORDER BY $order";

		$table=$this->table;

		$query="SELECT * FROM $table $where $order";
		$result=mysql_query($query);
		echo mysql_error();
		/* Printer Headeren */
		$ret.="<table cellspacing=0 cellpadding=0 border=0 class=list>";
		$ret.="<tr class=list>";

		for ($n=0;$n<mysql_num_fields($result);$n++) {
			$fieldname=mysql_field_name($result,$n);
			if (!$this->cfg[showfields][$table] || in_array($fieldname,$this->cfg[showfields][$table])) {
				$p_fieldname=str_replace("_"," ",ucwords($fieldname));
				$ret.="<th class=list>$p_fieldname</th>";
			}
		}
		$ret.="<th class=list>&nbsp;</th></tr>";
	
		while ($row=mysql_fetch_object($result)) {
			$p=="x" ? $p="" : $p="x";
			$ret.="<tr class=list>";
			for ($n=0;$n<mysql_num_fields($result);$n++) {			
				$fieldname=mysql_field_name($result,$n);
				if (!$this->cfg[showfields][$table] || in_array($fieldname,$this->cfg[showfields][$table])) {
					$value=stripslashes($row->$fieldname);

					if ($this->cfg[type][$table][$fieldname]=="image") {
					
						$timg=$row->id."_thumb.".$row->$fieldname;
            									                                    
                         if (file_exists($this->cfg[imagedir].$timg)) {
                         	$timglink="<img hspace=1 vspace=1 align=right src='".$this->cfg[imageurl]."$timg'>";
                         }
					
						$value=$timglink;
					}

					$ret.="<td class=list$p><a href='?table=$this->table&form=edit&id=$row->id'>$value</a></td>";
				}
			}
			$ret.="<td class=list$p align=right><a href='?table=$this->table&form=edit&id=$row->id'>edit</a></td>";
			$ret.="</tr>";
		}
	
		/* Printer Footeren */
		$ret.="</table>";
	
		echo $ret;
	}
	
	function edit_row($where="",$idfield="id",$namefield="navn") {

		$table=$this->table;
		$vars=$this->pvars;
		$id=$this->pvars[id];
		if ($this->gvars[id]) $id=$this->gvars[id];

		if ($where) $where="WHERE $where";
	
		if ($this->pvars[save]) {
			reset($vars);
			while ($field=key($vars)) {
			
						if (ereg("^date_y_",$field)) {
		                       	$rvar=str_replace("date_y_","",$field);
        		               	$n1="date_y_".$rvar;
                		       	$n2="date_m_".$rvar;
                		       	$n3="date_d_".$rvar;
                       			$val=$vars[$n1]."-".$vars[$n2]."-".$vars[$n3];
                       			$insert1.="$rvar,";
                       			$insert2.="'$val',";
                       			$update.="$rvar='$val',";
                		}
			
				if (ereg("save_",$field)) {
					$field=ereg_replace("save_","",$field);
					
					$vars["save_$field"]=addslashes($vars["save_$field"]);		
					
					$update.="$field='".$vars["save_$field"]."',";
					$insert1.="$field,";
					$insert2.="'".$vars["save_$field"]."',";
				}
				next($vars);
			}
			$update=ereg_replace(",$","",$update);
			$insert1=ereg_replace(",$","",$insert1);
			$insert2=ereg_replace(",$","",$insert2);
			if ($id) {
				$query="UPDATE $table SET $update WHERE $idfield='$id'";
				#echo $query;
				mysql_query($query);
				echo "<b>Skjema lagret.</b><p>";
			} else {
				$query="INSERT INTO $table ($insert1) values($insert2)";
				#echo $query;
				mysql_query($query);
				$id=mysql_insert_id();
				echo "<b>Skjema lagret.</b><p>";
			}
		}
		
		 // This is the image-addon-thingie-lalala
                global $userimage,$userimage_name;
                if ($_FILES[userimage1][tmp_name]) {
                        save_userfile($_FILES[userimage1][tmp_name],$_FILES[userimage1][name],$id,$table,1);
                }
                if ($_FILES[userimage2][tmp_name]) {
                        save_userfile($_FILES[userimage2][tmp_name],$_FILES[userimage2][name],$id,$table,2);
                }
                if ($_FILES[userimage3][tmp_name]) {
                        save_userfile($_FILES[userimage3][tmp_name],$_FILES[userimage3][name],$id,$table,3);
                }


                if ($_FILES[userfile][tmp_name]) {
                	
                	move_uploaded_file ( $_FILES["userfile"]["tmp_name"] , "/home/equippe.no/www/files/".$id."-".$_FILES[userfile][name]);

					mysql_query("UPDATE $table SET ".$this->cfg['filefield']."='".$id."-".$_FILES[userfile][name]."' WHERE id=$id");

                }

		if ($vars[delete] && $vars[confirm]) {
			$query="DELETE FROM $table WHERE $idfield='$id'";
			unset($id);
			mysql_query($query);
			echo "Entry Deleted.";
		}
	
		if ($id) {
			// Grab current info
			$query="SELECT * FROM $table WHERE $idfield='$id'";
			$result=mysql_query($query);
			$row=mysql_fetch_object($result);
		} else {
			$row=$this->cfg[current][$table];
		}
	
		if ($id) {
			$current=stripslashes($row->$namefield);
		} else {
			$current="Ny";
		}
		echo "<b>Redigerer nå: $current</b><p>";
	
		// Tegne skjema..
		$form.="<form method=post enctype='multipart/form-data'>";
		$form.="<input type=hidden name=id value=$id>";
		$form.="<input type=hidden name=save value=1>";
		$form.="<input type=hidden name=table value='$this->table'>";
		$form.="<table cellspacing=10 cellpadding=5 border=0 class=form>";

		$result=mysql_list_fields($this->db,$this->table);
		
		for ($n=0;$n<mysql_num_fields($result);$n++) {
				
			$fieldname=mysql_field_name($result,$n);
			$vname=0;
			$pfieldname=str_replace("_"," ",ucwords($fieldname));
                    if ($this->cfg[vname][$table][$fieldname]) { $pfieldname=$this->cfg[vname][$table][$fieldname]; $vname=1; }
			if (!@in_array($fieldname,$this->cfg[hidefields][$table])) {
				if (@in_array($fieldname,$this->cfg[readonly][$table])) {
					$form.="<tr class=form><td class=form>$pfieldname</td><td class=form>".stripslashes($row->$fieldname)."</td></tr>";
				} elseif (ereg("(.*)_id$",$fieldname,$vars)) {
					$tmp_table=$vars[1];
					if (!$vname) $pfieldname=str_replace("_"," ",ucwords(str_replace("s_id","",$fieldname)));
					$form.="<tr class=form><td class=form>$pfieldname</td><td>".$this->id_field($tmp_table,$row->$fieldname)."</td></tr>\n";
				} elseif ($this->cfg[type][$table][$fieldname]=="linked") {
                                        $tmp_table=$this->cfg[link][$table][$fieldname];
                                        
                                        $form.="<tr class=form><td class=form>$pfieldname</td><td>".$this->id_field($tmp_table,$row->$fieldname,$fieldname)."</td></tr>\n";
				} elseif ($this->cfg[type][$table][$fieldname]=="yesno") { 
					$chk=array(yes=>"",no=>"checked");
					if ($row->$fieldname==1) $chk=array(yes=>"checked",no=>"");
					$form.="<tr class=form><td class=form>$pfieldname</td><td><input type=radio name='save_$fieldname' value=1 $chk[yes]> Yes <input type=radio name='save_$fieldname'value=0 $chk[no]> No</td></tr>";
				} elseif ($this->cfg[type][$table][$fieldname]=="textarea") { 
					$psize="rows=4 cols=30";
					if ($this->cfg[size][$table][$fieldname]) $psize=$this->cfg[size][$table][$fieldname];
					$form.="<tr class=form><td class=form>$pfieldname</td><td><textarea $psize name='save_$fieldname'>".stripslashes($row->$fieldname)."</textarea></td></tr>";
				} elseif ($this->cfg[type][$table][$fieldname]=="selectlist") {
                                        $psel="";
                                        foreach ($this->cfg[options][$table][$fieldname] as $popt) {
                                                $psel.="<option value='$popt'";
                                                if ($popt==$row->$fieldname) $psel.=" selected";
                                                $psel.=">$popt</option>";
                                        }
                                        $form.="<tr class=form><td class=form>$pfieldname</td><td><select name='save_$fieldname'>$psel</select></td></tr>";
				} elseif ($this->cfg[type][$table][$fieldname]=="file") {
				
                	$timg=$table."_".$id."_".$i."_thumb.".$row->bilde;
           									                                    
                	if (file_exists($this->cfg[imagedir].$timg)) {
                    	$timglink="<br><img hspace=2 vspace=2 align=right src='".$this->cfg[imageurl]."$timg'>";
                    } else {
						$timglink="";
					}
                     $form.="<tr class=form><td class=form>$pfieldname</td><td class=form><input type=file name='userfile'></td></tr>";

				} elseif ($this->cfg[type][$table][$fieldname]=="image") {
				
					$i++;
				
					if ($row->id) {


                                                $timg=$table."_".$id."_".$i."_thumb.".$row->bilde;
           									                                    
                                                if (file_exists($this->cfg[imagedir].$timg)) {
                                                        $timglink="<br><img hspace=2 vspace=2 align=right src='".$this->cfg[imageurl]."$timg'>";
                                                } else {
													$timglink="";
												}
                                        }
                                        $form.="<tr class=form><td class=form>$pfieldname</td><td class=form><input type=file name='userimage".$i."'>$timglink</td></tr>";
				} elseif ($this->cfg[type][$table][$fieldname]=="date") {
					$var=$fieldname;
					$tmp1=explode(" ",$row->$fieldname);
					$tmp=explode("-",$tmp1[0]);
					$tmp[m]=$tmp[1];
					$tmp[y]=$tmp[0];
					$tmp[d]=$tmp[2];
					$form.="<tr class=form><td class=form>$pfieldname</td><td align=right>";
					$form.="<select name='date_d_$var'>";
					for ($ny=1;$ny<=31;$ny++) {
						if ($ny<10) $ny="0".$ny;
						$tmp[d]==$ny?$sel="selected":$sel="";
						$form.="<option $sel value='$ny'>$ny</option>";
					}
					$form.="</select>";
			                $form.="<select name='date_m_$var'>";
					for ($ny=1;$ny<=12;$ny++) {
						if ($ny<10) $ny="0".$ny;
						$tmp[m]==$ny?$sel="selected":$sel="";
						$form.="<option $sel value='$ny'>$ny</option>";
					}
					$form.="</select>";
                			$form.="<select name='date_y_$var'>";
					for ($ny=date("Y")+10;$ny>=1920;$ny--) {
						$tmp[y]==$ny?$sel="selected":$sel="";
						$form.= "<option $sel value='$ny'>$ny</option>";
					}
					$form.="</select></td></tr>";
				} else {
					$pfieldname=str_replace("_"," ",ucwords($fieldname));
					$form.="<tr class=form><td class=form>$pfieldname</td><td><input class=text type=text name='save_$fieldname' value='".stripslashes(str_replace("'","&#39;",$row->$fieldname))."'></td></tr>";
				}
			}
		}

		$form.="</table>";
		$form.="<input style='margin-left:15px' class=button type=submit value='Lagre skjema'></form>";
		echo $form;
	
		// add a delete form as well
		if ($id && !$this->cfg[nodelete][$table]) {
		?>
		<p>&nbsp;<p>
		<form method=post>
		<input type=hidden name=page value=<?php echo $page ?>>
		<input type=hidden name=id value=<? echo $id ?>>
		<input type=hidden name=delete value=1>
		<input type=hidden name=table value="<?php echo $this->table ?>">
		<input class=button type="submit" value="Slett"> <input type="checkbox" name="confirm" value="1"> Bekreft sletting

		</form>

		<?php
	
		if (is_array($this->cfg[linked][$table])) {
			echo "Linked Tables:<p>";
			foreach ($this->cfg[linked][$table] as $linked) {
				echo "<b>$linked</b><p>";
				$this->list_linked($linked,$id);
			}
			echo "<p>";
		}
	
		}
	}
	
	function id_field($table,$current="",$savename="") {
                $namefield="name";
                if ($this->cfg[namefield][$table]) {
                        $namefield=$this->cfg[namefield][$table];
                }
                if ($this->cfg[where][$table]) $where="WHERE {$this->cfg[where][$table]}";
                $query="SELECT id,$namefield as name FROM $table $where ORDER BY $namefield";
                $result=mysql_query($query);
                #echo $query;
                if (!$savename) $savename=$table."_id";
                while ($row=mysql_fetch_object($result)) {
                        $sel="";
                        if ($current==$row->id) {
                                $sel=" selected";
                        }
                        $ret.="<option value='$row->id'$sel>$row->name</option>";
                }
                return "<select name=save_$savename><option value=''>-ingen-</option>$ret</select>";
        }


	function id_field2($table,$current="") {
		$namefield="name";
		if ($this->cfg[namefield][$table]) {
			$namefield=$this->cfg[namefield][$table];
		}
		$query="SELECT id,$namefield as name FROM $table ORDER BY $namefield";
		$result=mysql_query($query);
		#echo $query;
		while ($row=mysql_fetch_object($result)) {
			$sel="";
			if ($current==$row->id) {
				$sel=" selected";
			}
			$ret.="<option value='$row->id'$sel>$row->name</option>";
		}
		return "<select name=save_$table"."_id>$ret</select>";
	}

	function list_linked($table,$id) {
		$idname=$this->table."_id";
		$result=mysql_query("SELECT id,name FROM $table WHERE $idname='$id'");
		if (mysql_num_rows($result)>0) {
			echo "<table class=list cellspacing=0 cellpadding=0 border=0>";
			echo "<tr><th class=list>Name</th><th class=list>&nbsp;</th></tr>";
			while ($row=mysql_fetch_object($result)) {
				echo "<tr class=list><td class=list>$row->name</td><td class=list align=right><a href='?table=$table&form=edit&id=$row->id'>edit</a></td></tr>";
			}
			echo "</table>";
		}
	}
}


?>

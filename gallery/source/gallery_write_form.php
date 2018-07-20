<?php
    session_start();
    
    include_once '../../common_lib/createLink_db.php';
    
    if(!empty($_GET['continent'])){
        $continent = $_GET['continent'];
    }
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    if(!empty($_GET['mode'])){
        $mode = $_GET['mode'];
    }

    if(!empty($_GET['page'])){
        $page = $_GET['page'];
    }
    
    if(!empty($_GET['table'])){
        $table = $_GET['table'];
    }
    
    if(!empty($_GET['num'])){
        $num = $_GET['num'];
    }
    
    
    
    
    
    
    
    if ($mode == "modify"){
        
        $sql = "select * from $table where num=$num";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        
        $item_subject = $row['subject'];
        $item_content = $row['content'];
        $item_continent = $row['continent'];
        
        $item_file_name_0 = $row['file_name_0'];
        $item_file_name_1 = $row['file_name_1'];
        $item_file_name_2 = $row['file_name_2'];
        
        $item_copy_file_0 = $row['file_copy_0'];
        $item_copy_file_1 = $row['file_copy_1'];
        $item_copy_file_2 = $row['file_copy_2'];
        
    }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
   <link href="../../common_css/index_css3.css?ver=1" rel="stylesheet"
	type="text/css" media="all">
   <link rel="stylesheet" href="../css/write_form.css?ver=1">
  <script>
      function check_insert(){

    	 if(!document.board_form.radio_from.value){
            alert("유형을 선택해주세요!");
            return;
         }
    	 
    	 if(!document.board_form.subject.value){
            alert("제목을 입력해주세요!");
            document.board_form.subject.focus();
            return;
         }
         
    	 if(!document.board_form.content.value){
            alert("내용을 입력해주세요!");
            document.board_form.content.focus();
            return;
         }
    	 
    	 if(!document.board_form.file_0.value && !document.board_form.file_1.value && !document.board_form.file_2.value){
             alert("이미지를 꼭 첨부해주세요!");
             return;
         }
    	 
    	 
    	 
    
         document.board_form.submit();
      }
 
  </script> 

  </head>
  <body onload="hide_file();">
  <header>
      <?php include_once '../../common_lib/top_login2.php'; ?>
    </header>
    <nav id="top">
      <?php include_once '../../common_lib/main_menu2.php'; ?>
    </nav>
        <section id="section">
      <article class="main">
        <div id="head">
          <h1>게시글 작성</h1>
        <hr size="3px" color="black">
        </div>
        
  <?php 
  if($mode === "modify"){   
  
  
      ?> 
  <form name="board_form" action="gallery_insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" method="post" enctype="multipart/form-data">
  <!-- 모드가 수정일때 -->
  
  
  <?php 
  }else{
  
  ?>
  <form name="board_form" action="gallery_insert.php?page=<?=$page?>" method="post" enctype="multipart/form-data">
  <!-- 모드가 수정이 아닌 일반 글쓰기일때 -->     
  
  <?php 
  }
  ?>
  
  <table border="1" id="table_good" >
  
  
<?php
	if( $mode != "modify" ){
?>
<tr>
	<th style="background-color: gray; text-align: center;">유 형</th>
	<td style="text-align: center;">
	<input type="radio" id="select_from" name="radio_from" value="Asia"/>Asia
	<input type="radio" id="select_from" name="radio_from" value="Europe"/>Europe
	<input type="radio" id="select_from" name="radio_from" value="America"/>America
	<input type="radio" id="select_from" name="radio_from" value="Afreeca"/>Afreeca
	<input type="radio" id="select_from" name="radio_from" value="Oceania"/>Oceania
	</td>
  </tr>

<?php 
	}
?>

<?php 
if($mode === "modify" && isset($item_continent)){
    
?>
   <tr>
	<th style="background-color: gray; text-align: center;">유 형</th>
		<td style="text-align: center;">
			<?php 
		
			if($item_continent == "Asia"){
			    
			?>
			
			<input type="radio" id="select_from" name="radio_from" checked="checked">Asia
			<input type="radio" id="select_from" name="radio_from" >Europe
			<input type="radio" id="select_from" name="radio_from" >America
			<input type="radio" id="select_from" name="radio_from" >Afreeca
			<input type="radio" id="select_from" name="radio_from" >Oceania
			<?php 
			
			}else if($item_continent == "Europe"){ 
			    
			?>
			<input type="radio" id="select_from" name="radio_from" >Asia
			<input type="radio" id="select_from" name="radio_from" checked="checked">Europe
			<input type="radio" id="select_from" name="radio_from" >America
			<input type="radio" id="select_from" name="radio_from" >Afreeca
			<input type="radio" id="select_from" name="radio_from" >Oceania
			<?php 
			
			}else if($item_continent == "America"){  
			    
			?>
			<input type="radio" id="select_from" name="radio_from" >Asia
			<input type="radio" id="select_from" name="radio_from" >Europe
			<input type="radio" id="select_from" name="radio_from" checked="checked">America
			<input type="radio" id="select_from" name="radio_from" >Afreeca
			<input type="radio" id="select_from" name="radio_from" >Oceania
			<?php 
			
			}else if($item_continent == "Afreeca"){  
			    
			?>
			<input type="radio" id="select_from" name="radio_from" >Asia
			<input type="radio" id="select_from" name="radio_from" >Europe
			<input type="radio" id="select_from" name="radio_from" >America
			<input type="radio" id="select_from" name="radio_from" checked="checked">Afreeca
			<input type="radio" id="select_from" name="radio_from" >Oceania
			<?php 
			
			}else if($item_continent == "Oceania"){  
			    
			?>
			<input type="radio" id="select_from" name="radio_from" >Asia
			<input type="radio" id="select_from" name="radio_from" >Europe
			<input type="radio" id="select_from" name="radio_from" >America
			<input type="radio" id="select_from" name="radio_from" >Afreeca
			<input type="radio" id="select_from" name="radio_from" checked="checked">Oceania
			
			<?php 
			}
        }
			?>
		</td>
  </tr>
  <tr>
  	<th style="background-color: gray; text-align: center;">제 목</th>
  	<td><input type="text" value="<?=$item_subject?>" name="subject" size="100"></td>
  </tr>
  <tr>
	<th style="background-color: gray; text-align: center;">내용</th>  
  	<td><textarea name="content" rows="25" cols="100"><?=$item_content?></textarea></td>
  </tr>
  
  
  
  
  <?php 
   if(empty($item_file_name_0)){
   ?>
  <tr>
	<th style="background-color: gray; text-align: center;">이미지 파일 1</th>  
  	<td><input id="file_0" type="file" name="upfile[]"></td>
  </tr>
  <?php 
  }
  ?>
  
  
  
  
  <?php 
   if($mode == "modify" && !empty($item_file_name_0)){
  ?>
  <tr>
	<th style="background-color: gray; text-align: center;">이미지 파일 1</th>  
  	<td><input id="file_0" type="file" name="upfile[]" value=""><?=$item_file_name_0?> 파일이 등록되어 있습니다.<input type="checkbox" name="del_file[]" value="0">삭제 </td>
  </tr>
  <?php 
   }
  ?>
  
  
  
  
  <?php 
  if(empty($item_file_name_1)){
  ?>
  <tr>
	<th style="background-color: gray; text-align: center;">이미지 파일 2</th>  
  	<td><input id="file_1" type="file" name="upfile[]"></td>
  </tr>
  <?php 
  }
  ?>
  
  
  
  
  <?php 
  if($mode == "modify" && !empty($item_file_name_1)){
  ?>
  <tr>
	<th style="background-color: gray; text-align: center;">이미지 파일 2</th>  
  	<td><input id="file_1" type="file" name="upfile[]" ><?=$item_file_name_1?> 파일이 등록되어 있습니다.<input type="checkbox" name="del_file[]" value="1">삭제 </td>
  </tr>
  <?php 
  }
  ?>
  
  
  
  
  
  <?php 
  if(empty($item_file_name_2)){
  ?>
  <tr>
	<th style="background-color: gray; text-align: center;">이미지 파일 3</th>  
  	<td><input id="file_2" type="file" name="upfile[]"></td>
  </tr>
  <?php 
  }
  ?>
  
  
  
  
  
  
  
   <?php 
   if($mode == "modify" && !empty($item_file_name_2)){
  ?>
  <tr>
	<th style="background-color: gray; text-align: center;">이미지 파일 3</th>  
  	<td><input id="file_2" type="file" name="upfile[]"><?=$item_file_name_2?> 파일이 등록되어 있습니다.<input type="checkbox" name="del_file[]" value="2">삭제 </td>
  </tr>
  <?php 
  }
  ?>
 
 </table>  
 
  
 
<div id="write_button"><a href="#"><img src="../img/ok.png" onclick="check_insert()"></a>
<a href="gallery_list.php?table=<?=$table?>&page=<?=$page?>&continent=<?=$continent ?>"><img src="../img/list.png"></a></div>
 
    </form>
      </article>
    </section>
     <footer>
       <?php include_once '../../common_lib/footer2.php';?>
    </footer>
     
  </body>
 
</html>
    


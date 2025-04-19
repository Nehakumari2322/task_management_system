<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<form action="<?php echo URLROOT; ?>taskmanagers/opencreateprojectpage" method="POST">
<div id="main">
<section style="margin:20px;">
<h3>New Project</h3>
    <!-- <form class="row g-3"> -->
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>

  <div class="col-md-6">
  <label for="Category">Category</label>
    <select id="category_id" name="category_id">
      <option value="Category">All Category</option>
      <?php $count=0; foreach($data as $dataline){ ?> 
        <option value="<?php echo $dataline->category_id;?>"><?php echo $dataline->category_name;?></option>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-6">
  <label for="Category">SubCategory</label>
    <select id="subcategory_id" name="subcategory_id">
      <option value="Subcategory">All Subcategory</option>
      <?php $count=0; foreach($additionalData as $dataline){ ?> 
        <option value="<?php echo $dataline->subcategory_id;?>"><?php echo $dataline->subcategory_name;?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-md-12">
  <label for="inputState" class="form-label">Task</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Start Date</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">End Date</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Assigned By</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>

            <div class='autocomplete'>
            <label for="task_search">Enter Task </label>
                <input type="text" id="task_search" name="task_search">
                <ul id="taskSearchResult"></ul>
                <div id="taskDetail"></div>

            <label for="task_search">Enter Company </label>
                <input type="text" id="company_search" name="company_search">
                <ul id="companySearchResult"></ul>
                <div id="companyDetail"></div>
            
          </div>

    <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</section>
</div><!--main-->
</form>
<script>

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
  
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }

  $(document).ready(function(){
    $("#task_search").keyup(function(){
        var search = $(this).val();
        if(search != "" & search.length >2){
            $.ajax({
                url: 'getTask1',
                type: 'post',
                data: {search:search, type:1},
                dataType: 'json',
                success:function(response){            
                    var len = response.length;
                    $("#taskSearchResult").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#taskSearchResult").append("<li value='"+id+"'>"+name+"</li>");
                    }
                    // binding click event to li
                    $("#taskSearchResult li").bind("click",function(){
                        setTaskText(this);
                    });
                }
            });
        }else{
            $("#taskSearchResult").empty();
        }
    });

    $("#company_search").keyup(function(){
        var search = $(this).val();
        if(search != ""){
            $.ajax({
                url: 'getTask1',
                type: 'post',
                data: {search:search, type:1},
                dataType: 'json',
                success:function(response){            
                    var len = response.length;
                    $("#companySearchResult").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#companySearchResult").append("<li value='"+id+"'>"+name+"</li>");
                    }
                    // binding click event to li
                    $("#companySearchResult li").bind("click",function(){
                        setCompanyText(this);
                    });
                }
            });
        }
    });
  });

</script>

<?php require APPROOT . '/views/inc/footer.php';?>

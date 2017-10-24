<?php
$category_id=$_GET['id'];
$query_result=$obj_super_admin->select_category_info_by_id($category_id);
$category_info=mysqli_fetch_assoc($query_result);
//$category_id=$_GET['id'];
//    $query=$obj_super_admin->select_category_info_by_id($category_id); 
//    $category=  mysqli_fetch_assoc($query); 

if (isset($_POST['btn_save'])) {
     $obj_super_admin->update_category_info($_POST);
}
?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Bus Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: #009900"><?php if (isset($message)) {echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" name="edit_category_form" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Bus Category Name</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" value="<?php echo $category_info['category_name'];?>" name="category_name" id="typeahead"  >
                            <input type="hidden" class="span6 typeahead" value="<?php echo $category_info['category_id'];?>" name="category_id">
                            <p class="help-block">Start typing to add category!</p>
                        </div>
                    </div>



                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Bus Category Comment</label>
                        <div class="controls">
                            <textarea class="cleditor"  name="category_description" id="textarea2" rows="3">
                                 <?php echo $category_info['category_description'];?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status" value="<?php category_info['publication_status'];?>" >
                                <option>--------Publication Status--------</option>
                                <option value="0">Unpublish</option>
                                <option value="1">Publish</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn_save" class="btn btn-primary">Update Category</button>
<!--                        <button type="reset" name="btn_reset" class="btn">Reset</button>-->
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div>

<script>
      document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $category_info['publication_status'];?>';
</script>



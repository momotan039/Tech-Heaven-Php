<?php
require '../../config/init.php';
require '../../inc/header.php';
?>
<?php
$query = $con->query('SELECT * FROM categories ');
$cats = $query->fetchAll(PDO::FETCH_ASSOC);
$query = $con->query('SELECT * FROM subcategories');
$sub_cats = $query->fetchAll(PDO::FETCH_ASSOC);
$query = $con->query('SELECT * FROM brands');
$brands = $query->fetchAll(PDO::FETCH_ASSOC);

// when adding item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    
}
?>
<div class="container">
    <h1>
        <fa style="color: blue;" class="fa-plus"></fa>Add new item
    </h1>
    <form method="post">
        <!-- Item name field -->
        <div class="mb-3">
            <label for="" class="form-label">Item:</label>
            <input required type="text" class="form-control" id="name" name="name">
        </div>
        <!-- Item description -->
        <div class="mb-3">
            <label for="" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="row">
            <!-- Item Price -->
            <div class="mb-3 col-6">
                <label for="" class="form-label">Price:</label>
                <input value="0" type="number" class="form-control" name="price">
            </div>
            <!-- Item Quantity Avaailable -->
            <div class="mb-3 col-6">
                <label for="" class="form-label">Quantity Avaailable:</label>
                <input value="0" type="number" class="form-control" name="quantity_available">
            </div>
        </div>
       <div class="row">
        <!-- Item Brand -->
        <div class="mb-3 col-4">
            <label for="" class="form-label">Brand:</label>
            <select name="brand" id="brand" class="form-control">
                <option selected disabled value="">Select a brand</option>
                <?php foreach ($brands as $brand) : ?>
                    <option value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['brand_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
         <!-- Item Category -->
         <div class="mb-3 col-4">
            <label for="" class="form-label">Category:</label>
            <select name="category" id="category" class="form-control">
                <option selected disabled value="">Select a category</option>
                <?php foreach ($cats as $cat) : ?>
                    <option value="<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Item Sub Category -->
        <div class="mb-3 col-4">
            <label for="" class="form-label">Sub Category:</label>
            <select onchange="renderSpecificationsBySubCat()" name="subcategory_id" id="subcategory_id" class="form-control">
                <option selected disabled value="">Select a Sub category</option>
                <?php foreach ($sub_cats as $cat) : ?>
                    <option value="<?php echo $cat['subcategory_id'] ?>"><?php echo $cat['subcategory_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
       </div>

        <!-- specifications -->
        <div class="row mb-3">
            <label for="" class="form-label col-6">specifications:</label>
            <!-- <select name="" id="specs" class="col-3">
                <option selected disabled>Select Item Type</option>
            </select> -->
            <div id="specs" class="row">
                <!-- <?php foreach ($specifications['smartphone'] as $specific) : ?>
                    <div class="col-6 mb-3">
                        <input name="specifications[<?php echo $specific ?>]" placeholder="Enter Item <?php echo $specific ?>" type="text" class="form-control">
                    </div>
                <?php endforeach; ?> -->
            </div>
        </div>
        <button class="btn btn-primary">click me</button>
    </form>
</div>
<script>
    async function renderSpecificationsBySubCat() {
        let sub_cat = event.target.value;
        let specsContainer=document.getElementById('specs')

        let data=await fetch(`../../api/specifications.php?sub_category=${sub_cat}`)
        data=await data.json();
        specsContainer.innerHTML=""
        data.forEach(item => {
            let input=`<div class="col-6 mb-3">
                    <input name="specifications[${item.specification_id}:]" placeholder="Enter ${item.name}" class="form-control">
                   </div>`
                   specsContainer.innerHTML+=input;
        });
        console.log(data);
    }
</script>
<?php
require '../../inc/footer.php';
?>
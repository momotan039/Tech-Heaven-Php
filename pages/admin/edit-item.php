<?php
require '../../config/init.php';
require '../../inc/header.php';
require '../../app/crud/items.php';
?>
<?php
if (!isset($_GET['id'])) {
    header('Location:' . $root);
    exit;
}
$product = getItem($_GET['id']);
// get specifications product
$query = $con->prepare('SELECT * FROM `productspecifications` 
where productspecifications.product_id=?');
$query->execute([$product['product_id']]);
$specifications = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $con->query('SELECT * FROM categories ');
$cats = $query->fetchAll(PDO::FETCH_ASSOC);
$query = $con->query('SELECT * FROM subcategories');
$sub_cats = $query->fetchAll(PDO::FETCH_ASSOC);
$query = $con->query('SELECT * FROM brands');
$brands = $query->fetchAll(PDO::FETCH_ASSOC);

// when adding item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    editProduct($_POST,$product['product_id']);
}
?>
<div class="container">
    <h1>
        <fa style="color: blue;" class="fa-plus"></fa>Edit item
    </h1>
    <form method="post">
        <!-- Item name field -->
        <div class="mb-3">
            <label for="" class="form-label">Item:</label>
            <input required type="text" class="form-control" id="name" name="name" value="<?php echo $product['name'] ?>">
        </div>
        <!-- Item description -->
        <div class="mb-3">
            <label for="" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description"><?php echo $product['description'] ?></textarea>
        </div>
        <div class="row">
            <!-- Item Price -->
            <div class="mb-3 col-6">
                <label for="" class="form-label">Price:</label>
                <input value="<?php echo $product['price'] ?>" type="number" class="form-control" name="price">
            </div>
            <!-- Item Quantity Avaailable -->
            <div class="mb-3 col-6">
                <label for="" class="form-label">Quantity Avaailable:</label>
                <input value="<?php echo $product['quantity_available'] ?>" type="number" class="form-control" name="quantity_available">
            </div>
        </div>
        <div class="row">

            <!-- Item Category -->
            <div class="mb-3 col-4">
                <label for="" class="form-label">Category:</label>
                <select name="category_id" id="category" class="form-control">
                    <option selected disabled value="">Select a category</option>
                    <?php foreach ($cats as $cat) : ?>
                        <option selected="<?php $cat['category_id'] == $product['category_id'] ?>" value="<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Item Sub Category -->
            <div class="mb-3 col-4">
                <label for="" class="form-label">Sub Category:</label>
                <select  name="sub_category_id" id="sub_category_id" class="form-control">
                    <option selected disabled value="">Select a Sub category</option>
                    <?php foreach ($sub_cats as $cat) : ?>
                        <option selected="<?php $cat['subcategory_id'] == $product['sub_category_id'] ?>" value="<?php echo $cat['subcategory_id'] ?>"><?php echo $cat['subcategory_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Item Brand -->
            <div class="mb-3 col-4">
                <label for="" class="form-label">Brand:</label>
                <select name="brand_id" id="brand" class="form-control">
                    <option selected disabled value="">Select a brand</option>
                    <?php foreach ($brands as $brand) : ?>
                        <option selected="<?php $brand['brand_id'] == $product['brand_id'] ?>" value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['brand_name'] ?></option>
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
            </div>
        </div>
        <button class="btn btn-primary">click me</button>
    </form>
</div>
<script>
    async function renderSpecificationsByByProductId() {
        let specsContainer = document.getElementById('specs')
        let data = await fetch(`../../api/product_specifications.php?product_id=<?php echo $product['product_id'] ?>`)
        data = await data.json();
        console.log(data)
        specsContainer.innerHTML = ""
        data.forEach(item => {
            let input = `<div class="col-6 mb-3">
                    <input value="${item.value}" name="specifications[${item.specification_id}]" placeholder="Enter ${item.name}" class="form-control">
                   </div>`
            specsContainer.innerHTML += input;
        });
    }
    renderSpecificationsByByProductId();
</script>
<?php
require '../../inc/footer.php';
?>
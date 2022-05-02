<style>
.book-search a{
    margin-right: 35px;
}

.d-flex.justify-content-end.book-search {
    margin-bottom: 20px;
}
</style>
<form id="searchform" method="post">
    <h2> Booking Operations</h2>
    <div class="d-flex justify-content-end book-search">
    <a href="?new" name="create" class="btn btn-primary">Add new <?php echo ucfirst($type);?></a></td>
    <a href="?all" name="create" class="btn btn-success">View <?php echo ucfirst($type);?></a></td>
    </div>
</form>

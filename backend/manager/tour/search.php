<form id="searchform" method="post">
<table class="table">
    <tr colspan="3">
    <td>Search Users</td>
    <td><a href="?new" class="btn btn-primary btn-block" name="create">Add new tour post</a></td>
    <td><a href="?all" class="btn btn-success btn-block" name="create">View <?php echo ucfirst($type);?></a></td>
    </tr>
      <tr>
    <td>Search By Search Key
        <select name="searchby">
            <option value="id">Id</option>
            <option value="category_id">Category ID</option>
            <option value="toppackages">Top Packages</option>
            <option value="title" selected>Title</option>
            <option value="url">URl</option>
            <option value="seotitle">SEO Title</option>
            <option value="seodesc">SEO Description</option>
            <option value="postdate">Post Date</option>
            <option value="image">Image</option>
            <option value="summary">Summary</option>
            <option value="detail">Detail</option>
            <option value="hits">Hits</option>
            <option value="status">Status</option>
            
        </select>
        <input type="text" name="searchkey" id="searchkey">
        <button type="submit" name="search-btn" class="btn btn-secondary">Search Tour post</button>
    </td>
    </tr>
</table>
</form>

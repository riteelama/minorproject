<form id="searchform" method="post">
<table class="table">
    <tr colspan="3">
    <td>Search Users</td>
    <td><a href="?new" class="btn btn-primary btn-block" name="create">Add new User</a></td>
    <td><a href="?all" class="btn btn-success btn-block" name="create">View <?php echo ucfirst($type);?></a></td>
    </tr>
      <tr>
    <td>Search By Search Key
        <select name="searchby">
            <option value="id">Id</option>
            <option value="fullname" selected>Full Name</option>
            <option value="email">Email</option>
            <option value="postdate">Date</option>
            <option value="status">Status</option>
        </select>
        <input type="text" name="searchkey" id="searchkey">
        <button type="submit" name="search-btn" class="btn btn-secondary">Search Users</button>
    </td>
    </tr>
</table>
</form>

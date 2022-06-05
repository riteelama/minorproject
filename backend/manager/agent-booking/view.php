<!-- <body id="page-top"> -->

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">View <?php echo $viewData['title'];?></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            
            <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
            
        <tr role="row">
            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 194px;" name="id">ID</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="category_id">Category</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="toppackages">Top Packages</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="title">Title</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="url">URL</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="seotitle">SEO Title</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="seodesc">SEO Description</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="image">Image</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="summary">Summary</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="detail">Details</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="hits">Hits</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="postdate">PostDate</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 296px;" name="status">Status</th>
        </tr>
                
    </thead>
            
    <tbody>
        <tr>
            <td><?php echo $viewData['id'];?>
            </tr>
            <tr>
            <td><?php echo $viewData['category_id'];?>
        </tr>
            <td><?php echo $viewData['toppackages'];?>
            <td><?php echo $viewData['title'];?>
            <td><?php echo $viewData['url'];?>
            <td><?php echo $viewData['seotitle'];?>
            <td><?php echo $viewData['seodesc'];?>
            <td><img src="<?php echo $viewData['image'];?>"/>
            <?php echo $viewData['image'];?>
            <td><?php echo $viewData['summary'];?>
            <td><?php echo $viewData['details'];?>
            <td><?php echo $viewData['hits'];?>
            <td><?php echo $viewData['postdate'];?>
            <td><?php echo $viewData['status']?'Active':'Inactive';?>
        </tr>
    </tbody> 

        </table>
    </div>
    </div>

            
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    

</div>
<!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->







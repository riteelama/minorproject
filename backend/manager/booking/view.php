<?php
$email = $_SESSION['loginAccess'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$username = $row['username'];
?>


<div class="container">
    <div class="card">
        <div class="card-body">
            <!-- <h6 class="card-subtitle">globe type chair for rest</h6>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img src="https://www.bootdey.com/image/430x600/00CED1/000000" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Product description</h4>
                    <p>Lorem Ipsum available,but the majority have suffered alteration in some form,by injected humour,or randomised words which don't look even slightly believable.but the majority have suffered alteration in some form,by injected humour</p>
                    <h2 class="mt-5">
                        $153<small class="text-success">(36%off)</small>
                    </h2>
                    <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <button class="btn btn-primary btn-rounded">Buy Now</button>
                    <h3 class="box-title mt-5">Key Highlights</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                        <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                        <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                    </ul>
                </div> -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5 mb-5"><?php echo ucfirst($username); ?>, here is your booked package information</h3>
                    <div class="table-responsive">
                        <table class="table table-product responsive table-bordered">
                            <tbody>
                                <?php if($count>0){ ?>
                                        <tr>
                                            <td>Package Name</td>
                                            <td><?php echo $packageView['package_name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Number of children</td>
                                            <td><?php echo $packageView['children_count'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Number of adult</td>
                                            <td><?php echo $packageView['adult_count'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Booked for</td>
                                            <td><?php echo $packageView['booked_for'];?></td>
                                        </tr>

                                        </tr>
                                        <td>Package Status</td>
                                        <td style="color:<?php echo $packageView['status'] ? 'green' : 'red'; ?>"><?php echo $packageView['status'] ? 'Approved' : 'Not Approved'; ?></td>
                                        </td>
                                        </tr>

                                        <tr class="bg-dark text-light text-justify">
                                            <td class="text-center">Total Amount</td>
                                            <td class="text-center"><?php echo $packageView['total_amount'];?></td>
                                        </tr>
                               <?php  };?>
                            </tbody>
                        </table>

                        <a class="btn btn-primary ml-3 btn-md float-right" href="invoice.php?id=<?php echo $packageView['id']?>" type="submit"><i class="fas fa-print"></i> Print My Booked Packages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
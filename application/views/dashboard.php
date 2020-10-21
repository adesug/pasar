<!-- Earnings (Monthly) Card Example -->
<div class="shortcut container">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card mb-3" style="border-radius: 20px; background-color: #94cbdc;">
            <div class="row text-white">
                <div class="col-10 mt-3">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Users</div>
                        <?php foreach($users as $s) :?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['totaluser']; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-2 mt-5">
                    <i class="fas fa-user-alt fa-2x "></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4 ">
        <div class="card mb-3" style="border-radius: 20px; background-color: #44bd32">
            <div class="row" style="color: white;">
                <div class="col-10 mt-3">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Items</div>
                        <?php foreach($items as $s) :?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['totalItem']; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-2 mt-5">
                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4 ">
        <div class="card mb-3" style="border-radius: 20px; background-color: gold">
            <div class="row" style=" color: white;">
                <div class="col-10 mt-3">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Orders On Chart</div>
                        <?php foreach($onchart as $s) :?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['totalOnChart']; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-2 mt-5">
                    <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card mb-3" style="border-radius: 20px; background-color:  #4cd137">
            <div class="row text-white">
                <div class="col-10 mt-3">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Orders Completed</div>
                        <?php foreach($complete as $s) :?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['totalCompleted']; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-2 mt-5">
                    <i class="fas fa-check-square fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card mb-3" style="border-radius: 20px; background-color: rgb(241, 144, 144);">
            <div class="row text-white">
                <div class="col-10 mt-3">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Orders Canceled</div>
                        <?php foreach($cancel as $s) :?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['totalCanceled']; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-2 mt-5">
                    <i class="fas fa-window-close fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card mb-3" style="border-radius: 20px; background-color: #94e490;">
                    <div class="row text-white">
                        <div class="col-10 mt-3">
                            <div class="card-body">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Orders </div>
                                <?php foreach($order as $s) :?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['totalOrder']; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-2 mt-5">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../boot/load.php';

use Classes\OrganizationClass;

$data = OrganizationClass::getAllOrganization();

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>

<!-- Start Content -->
<div class="container mt-3">

    <div class="alert alert-info text-center">
        <strong>Manage Organization!</strong>
    </div>

    <?php require_once __DIR__.'/elements/handle_alert.php'; ?>

    <div class="row" style="margin-bottom:80px">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">Add organization</div>
                <div class="card-body">
                    <form action="<?php echo __HOST__ ?>/classes/OrganizationClass.php" method="post">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="Organization name" required>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="tel" id="" class="form-control" placeholder="Phone" required>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="email" name="email" id="" class="form-control" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-success btn-block" type="submit" name="add">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-md table-striped">
                        <table class="table" id="manageOrganization">
                            <thead>
                                <tr>
                                    <th>Organization Name</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
                                    <th>Test creater</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $item): ?>
                                <tr>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['tel'] ?></td>
                                    <td><?php echo $item['email'] ?></td>
                                    <td><button class="btn btn-sm btn-secondary">N/A</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

<script>
    $('#manageOrganization').DataTable()
</script>

<?php require_once __DIR__.'/layout/foot.php'; ?>
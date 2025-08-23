<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr >
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar-xs rounded-circle"
                                    onerror="this.src='<?php echo e(asset('storage/app/public/upload/default.jpg')); ?>'"
                                    src="<?php echo e(asset('storage/app/public/upload/')); ?>/<?php echo e($value->image); ?>" alt="banner image"/>
                            </div>
                            <div class="flex-grow-1">
                                <?php echo e($value->name); ?><br>
                                <b><?php echo e(sort_name.$value->user_id); ?></b>
                            </div>
                        </div>
                    </td>
                    
                    <td><?php echo e($value->email); ?></td>
                    <td><?php echo e($value->phone); ?></td>
                    <td><?php echo e(date("D d F Y h:i A", strtotime($value->add_date_time))); ?></td>
                    <td>
                        <?php if($value->status==1): ?>
                        <span class="badge bg-success">Active</span>
                        <?php endif; ?>
                        <?php if($value->status==0): ?>
                        <span class="badge bg-danger">Blocked</span>
                        <?php endif; ?>
                    </td>
                    <td>                        
                        <a href="<?php echo e(route('user.account-action').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-info mb-1 w-100">Account View</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <!-- end table -->
    </div>
</div>


<div class="card pagination" >
    <?php echo e($data_list->links()); ?>

</div>
<?php /**PATH C:\xamp\htdocs\projects\ratsoftware\resources\views/admin/user/table.blade.php ENDPATH**/ ?>
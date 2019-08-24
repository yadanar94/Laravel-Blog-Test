<?php $__env->startSection('content'); ?>
    <div class="container">

        <?php if(session('info')): ?>
            <div class="alert alert-info">
                <?php echo e(session('info')); ?>

            </div>
        <?php endif; ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <b><?php echo e($post->title); ?></b>
            </div>
            <div class="panel-body">
                <?php echo $post->body; ?>

            </div>
            <div class="panel-footer clearfix">
                <small><?php echo e($post->created_at->diffForHumans()); ?></small>
                <b>in <?php echo e($post->category->name); ?></b>

                <div class="pull-right">
                    <a href="<?php echo e(url("/posts/edit/$post->id")); ?>" class="btn btn-default">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?php echo e(url("/posts/delete/$post->id")); ?>" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>

        <h3>Comments ( <?php echo e(count($post->comments)); ?> )</h3>
        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo $comment->comment; ?>

                </div>
                <div class="panel-footer">
                    <?php echo e($comment->created_at->diffForHumans()); ?>

                    <b>by <?php echo e($comment->user->name); ?></b>
                    <div class="pull-right">
                        <a href="<?php echo e(url("/comments/delete/$comment->id")); ?>">Del</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php if(Auth::user()): ?>
            <form action="<?php echo e(url('/comments/add')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                <textarea name="comment" class="form-control"></textarea>
                <input type="submit" value="Add Comment" class="btn btn-default">
            </form>
            <br><br>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
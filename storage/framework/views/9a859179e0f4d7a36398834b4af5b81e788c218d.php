<?php $__env->startSection('content'); ?>
    <div class="container">

        <?php if(session('info')): ?>
            <div class="alert alert-info">
                <?php echo e(session('info')); ?>

            </div>
        <?php endif; ?>

        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>
                        <i class="far fa-newspaper"></i>
                        <a href="<?php echo e(url("/posts/view/$post->id")); ?>">
                            <?php echo e($post->title); ?>

                        </a>
                    </b>
                </div>
                <div class="panel-body">
                    <?php echo $post->body; ?>

                </div>
                <div class="panel-footer">
                    <small><?php echo e($post->created_at->diffForHumans()); ?></small>
                    <b>in <?php echo e(isset($post->category->name) ? $post->category->name : 'Unknown'); ?></b>

                    <div class="pull-right">
                        <i class="fas fa-comment"></i>
                        <?php echo e(count($post->comments)); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php echo e($posts->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Categoria: <?php echo e($posts->first()->category->name); ?></div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="blog-entry d-flex blog-entry-search-item">
                    <a href="<?php echo e(route('single', ['slug' => $post->slug])); ?>" class="img-link me-4">
                        <img src="<?php echo e(Voyager::image($post->image)); ?>" alt="Image" class="img-fluid">
                    </a>
                    <div>
                        <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?> &bullet; <a href="#"><?php echo e($post->category->name); ?></a></span>
                        <h2><a href="<?php echo e(route('single', ['slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a></h2>
                        <p><?php echo e(Str::limit($post->excerpt, 100)); ?></p>
                        <p><a href="<?php echo e(route('single', ['slug' => $post->slug])); ?>" class="btn btn-sm btn-outline-primary">Leer mas</a></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                <div class="row text-start pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            <span>1</span>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <span>...</span>
                            <a href="#">15</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 sidebar">

                <div class="sidebar-box search-form-wrap mb-4">
                    <form action="#" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Buscar palabra clave">
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Post Populares</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php
                                $popularPosts = \TCG\Voyager\Models\Post::inRandomOrder()->take(3)->get();
                            ?>

                            <?php $__currentLoopData = $popularPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('single', $post->slug)); ?>">
                                        <img src="<?php echo e(Voyager::image($post->image)); ?>" alt="Image placeholder"
                                            class="me-4 rounded">
                                        <div class="text">
                                            <h4><?php echo e($post->title); ?></h4>
                                            <div class="post-meta">
                                                <span class="mr-2"><?php echo e($post->created_at->format('F j, Y')); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-box">
                    <h3 class="heading">Categorias</h3>
                    <ul class="categories">
                        <li><a href="#">Ciberseguridad <span>(12)</span></a></li>
                        <li><a href="#">Web <span>(22)</span></a></li>
                        <li><a href="#">Software <span>(37)</span></a></li>
                        <li><a href="#">I.A <span>(42)</span></a></li>
                    </ul>
                </div>
                <!-- END sidebar-box -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neji21/Documents/php/newsPortalPHP/resources/views/pages/category.blade.php ENDPATH**/ ?>
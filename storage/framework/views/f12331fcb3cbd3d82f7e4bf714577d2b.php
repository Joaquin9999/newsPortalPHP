<?php $__env->startSection('content'); ?>
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            <?php
                // Obtener 6 posts aleatorios
                $randomPosts = \TCG\Voyager\Models\Post::inRandomOrder()->take(6)->get();
            ?>

            <?php $__currentLoopData = $randomPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <a href="<?php echo e(route('single', $post->slug)); ?>" class="h-entry mb-30 v-height gradient">
                        <div class="featured-img" style="background-image: url('<?php echo e(Voyager::image($post->image)); ?>');">
                        </div>
                        <div class="text">
                            <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?></span>
                            <h2><?php echo e($post->title); ?></h2>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

    <!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Ciberseguridad    </h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a href="category.html" class="read-more">Ver Todos</a>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-8"> <!-- Aumentar espacio para el post -->
                <div class="row g-3">
                    <?php $__currentLoopData = $posts->where('category_id', 1)->slice(1, 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Solo un post destacado -->
                        <div class="col-md-12"> <!-- Usar col-md-12 para que ocupe toda la columna -->
                            <div class="blog-entry">
                                <a href="<?php echo e(route('single', $post->slug)); ?>" class="img-link">
                                    <img src="<?php echo e(Voyager::image($post->image)); ?>" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                </a>
                                <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?></span>
                                <h2><a href="<?php echo e(route('single', $post->slug)); ?>"><?php echo e($post->title); ?></a></h2>
                                <p><?php echo e(Str::limit($post->excerpt, 100)); ?></p>
                                <p><a href="<?php echo e(route('single', $post->slug)); ?>" class="btn btn-sm btn-outline-primary">Leer Mas</a></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="col-md-4"> <!-- Reducir el espacio para la lista -->
                <h3 class="posts-entry-title">Posts Recientes</h3>
                <ul class="list-unstyled blog-entry-sm">
                    <?php $__currentLoopData = $posts->slice(2, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Mostrar los siguientes posts -->
                        <li>
                            <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?></span>
                            <h3><a href="<?php echo e(route('single', $post->slug)); ?>"><?php echo e($post->title); ?></a></h3>
                            <p><?php echo e(Str::limit($post->excerpt, 100)); ?></p>
                            <p><a href="<?php echo e(route('single', $post->slug)); ?>" class="read-more">Continuar Leyendo</a></p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>

    
    <!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $posts->where('category_id', 4)->slice(0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Muestra solo los primeros 4 posts -->
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="<?php echo e(route('single', $post->slug)); ?>" class="img-link">
                            <img src="<?php echo e(Voyager::image($post->image)); ?>" alt="Image" class="img-fluid">
                        </a>
                        <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?></span>
                        <h2><a href="<?php echo e(route('single', $post->slug)); ?>"><?php echo e($post->title); ?></a></h2>
                        <p><?php echo e(Str::limit($post->excerpt, 100)); ?></p>
                        <p><a href="<?php echo e(route('single', $post->slug)); ?>" class="read-more">Continuar Leyendo</a></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- End posts-entry -->
<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Web</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">Ver Todos</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9 order-md-2">
                <div class="row g-3">
                    <?php $__currentLoopData = $posts->where('category_id', 2)->slice(1, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Mostrar los primeros 3 posts -->
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="<?php echo e(route('single', $post->slug)); ?>" class="img-link">
                                    <img src="<?php echo e(Voyager::image($post->image)); ?>" alt="Image" class="img-fluid">
                                </a>
                                <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?></span>
                                <h2><a href="<?php echo e(route('single', $post->slug)); ?>"><?php echo e($post->title); ?></a></h2>
                                <p><?php echo e(Str::limit($post->excerpt, 100)); ?></p>
                                <p><a href="<?php echo e(route('single', $post->slug)); ?>" class="btn btn-sm btn-outline-primary">Leer Mas</a></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    <?php $__currentLoopData = $posts->where('category_id', 2)->slice(0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Mostrar los siguientes 2 posts -->
                        <li>
                            <span class="date"><?php echo e($post->created_at->format('M. d, Y')); ?></span>
                            <h3><a href="<?php echo e(route('single', $post->slug)); ?>"><?php echo e($post->title); ?></a></h3>
                            <p><?php echo e(Str::limit($post->excerpt, 100)); ?></p>
                            <p><a href="<?php echo e(route('single', $post->slug)); ?>" class="read-more">Continuar Leyendo</a></p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">I.A</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">Ver todos</a></div>
        </div>

        <div class="row">
            <div class="row">
                <?php $__currentLoopData = $posts->where('category_id', 3)->slice(0, 9); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="<?php echo e(route('single', $post->slug)); ?>" class="img-link">
                                <img src="<?php echo e(Voyager::image($post->image)); ?>" alt="Image" class="img-fluid">
                            </a>
                            <div class="excerpt">
                                <h2><a href="<?php echo e(route('single', $post->slug)); ?>"><?php echo e($post->title); ?></a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 me-3 float-start">
                                        <img src="images/person_1.jpg" alt="Image" class="img-fluid"> <!-- Usa el avatar asociado al author_id -->
                                    </figure>
                                    <span class="d-inline-block mt-1">By <a href="#"><?php echo e($post->author); ?></a></span> <!-- Usa el nombre del autor -->
                                    <span>&nbsp;-&nbsp; <?php echo e($post->created_at->format('F j, Y')); ?></span>
                                </div>
                                <p><?php echo e($post->excerpt); ?></p>
                                <p><a href="<?php echo e(route('single', $post->slug)); ?>" class="read-more">Continuar Leyendo</a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>

    </div>
</section>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neji21/Documents/php/newsPortalPHP/resources/views/pages/home.blade.php ENDPATH**/ ?>
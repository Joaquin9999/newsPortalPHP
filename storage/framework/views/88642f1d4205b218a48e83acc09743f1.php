<?php $__env->startSection('content'); ?>
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('<?php echo e(Voyager::image($post->image)); ?>');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4"><?php echo e($post->title); ?></h1>
                        <div class="post-meta align-items-center text-center">
                            <!--
                            <figure class="author-figure mb-0 me-3 d-inline-block"><img src="images/person_1.jpg"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By Carl Atkinson</span>
                            -->
                            <span>&nbsp;-&nbsp; <?php echo e($post->created_at->format('Y-m-d')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <?php echo $post->body; ?>


                    </div>

                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard">
                                    <img src="images/person_2.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard">
                                            <img src="images/person_3.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jean Doe</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                                enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                            </p>
                                            <p><a href="#" class="reply rounded">Reply</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard">
                                                    <img src="images/person_4.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Jean Doe</h3>
                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                        officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                        impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard">
                                                            <img src="images/person_5.jpg" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Jean Doe</h3>
                                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                                autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                                Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply rounded">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5" style="padding-bottom: 50px;">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->
                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="sidebar-search-form">
                            <span class="bi-search"></span>
                            <input type="text" class="form-control" id="s"
                                placeholder="Type a keyword and hit enter">
                        </form>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Posts Populares</h3>
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
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categorias</h3>
                        <ul class="categories">
                            <li><a href="#">Food <span>(12)</span></a></li>
                            <li><a href="#">Travel <span>(22)</span></a></li>
                            <li><a href="#">Lifestyle <span>(37)</span></a></li>
                            <li><a href="#">Business <span>(42)</span></a></li>
                            <li><a href="#">Adventure <span>(14)</span></a></li>
                        </ul>
                    </div>



                    <div class="sidebar-box">
                        <h3 class="heading">Keywords</h3>
                        <ul class="tags">
                            <?php
                                // Obtener las keywords del post actual
                                $keywords = explode(',', $post->meta_keywords);
                                // Crear un array para almacenar los tags
                                $tags = [];

                                // Limpiar y agregar al array de tags
                                foreach ($keywords as $keyword) {
                                    $trimmedTag = trim($keyword);
                                    if (!empty($trimmedTag)) {
                                        $tags[] = $trimmedTag; // Agregar el tag limpio al array
                                    }
                                }

                                // Eliminar duplicados
                                $tags = array_unique($tags);
                            ?>

                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="#"><?php echo e($tag); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>


                <section class="section posts-entry posts-entry-sm bg-light">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-12 text-uppercase text-black">Mas posts</div>
                        </div>
                        <div class="row">
                            <?php
                                $morePosts = \TCG\Voyager\Models\Post::inRandomOrder()->take(4)->get();
                            ?>

                            <?php $__currentLoopData = $morePosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $morePost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="blog-entry">
                                        <a href="<?php echo e(route('single', $morePost->slug)); ?>" class="img-link">
                                            <img src="<?php echo e(Voyager::image($morePost->image)); ?>" alt="Image"
                                                class="img-fluid">
                                        </a>
                                        <span class="date"><?php echo e($morePost->created_at->format('M. jS, Y')); ?></span>
                                        <h2><a href="<?php echo e(route('single', $morePost->slug)); ?>"><?php echo e($morePost->title); ?></a>
                                        </h2>
                                        <p><?php echo e(Str::limit(strip_tags($morePost->body), 100)); ?></p>
                                        <p><a href="<?php echo e(route('single', $morePost->slug)); ?>" class="read-more">Leer mas</a></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neji21/Documents/php/newsPortalPHP/resources/views/pages/post.blade.php ENDPATH**/ ?>
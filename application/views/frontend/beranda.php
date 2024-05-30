<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('frontend/template/head')?>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
    .footer-divider {
        border-top: 0.5px solid #fff;
        margin-top: 1px;
    }

    .main-image img {
        width: 100%;
        height: auto;
    }

    @media (max-width: 767px) {
        .main-image img {
            height: auto;
            max-height: 200px;
            /* Atur tinggi maksimum gambar untuk tampilan mobile */
        }
    }

    .thumbnail {
        display: flex;
        gap: 10px;
        cursor: pointer;
        justify-content: center;
        margin-top: 10px;
    }

    .thumbnail img {
        width: 150px;
        height: 100px;
        object-fit: cover;
    }

    .thumbnail img.active {
        border: 2px solid var(--bs-primary);
    }

    .thumbnail .col-lg-3 {
        flex: 1;
        max-width: 25%;
    }

    .thumbnail .image-areas img {
        width: 100%;
        height: auto;
    }
    </style>
</head>

<body>
    <?php $this->load->view('frontend/template/canvas')?>
    <header id="back-header" class="back-header">
        <?php $this->load->view('frontend/template/toolbar')?>
        <?php $this->load->view('frontend/template/mobile')?>

    </header>
    <div class="back-wrapper">
        <div class="back-home2-slider-area back-home3-slider-area">
            <div class="container">
                <br>
                <ul class="back-hero-bottom-two back-hero-slider3 owl-carousel">

                    <?php foreach($headline as $head):?>
                    <li>
                        <div class="image-areas">
                            <a
                                href="<?= base_url('detail/' . url_title($head['tgl_berita'], 'dash', TRUE) . '/' . url_title($head['sub_judul'], 'dash', TRUE)) ?>"><img
                                    src="<?= base_url('img/berita/' . $head['gambar']); ?>" alt="image"
                                    style="width: 100px !important; height: 70px !important;"></a>
                        </div>
                        <div class="back-btm-content">
                            <h3><a
                                    href="<?= base_url('detail/' . url_title($head['tgl_berita'], 'dash', TRUE) . '/' . url_title($head['sub_judul'], 'dash', TRUE)) ?>"><?= $head['judul']?></a>
                            </h3>
                        </div>
                    </li>
                    <?php endforeach;?>

                </ul>
            </div>
        </div>
        <div class="back-hero-area back-latest-posts back-whats-posts back-hero-area2 back-hero-area3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="back-hero-area back-latest-posts pt-0 pb-0">
                            <ul>
                                <li>
                                    <div class="main-image">
                                        <div class="image-area">
                                            <img src="<?= base_url('img/berita/' . $empat[0]['gambar']); ?>"
                                                style="width: 100% !important; height: 500px !important;"
                                                alt="Main Image" id="mainImage">
                                            <div class="back-btm-content">

                                                <a href="<?= $empat[0]['url']?>" class="back-cate back-sp"
                                                    id="mainCategory"><?= $empat[0]['nm_kategori_master']?></a>
                                                <h3><a href="<?= base_url('detail/' . url_title($empat[0]['tgl_berita'], 'dash', TRUE) . '/' . url_title($empat[0]['sub_judul'], 'dash', TRUE)) ?>"
                                                        id="mainTitle"><?= $empat[0]['judul']?></a></h3>
                                                <ul>
                                                    <li class="back-author"><a href="#" id="mainAuthor">By
                                                            <?= $empat[0]['nama']?></a></li>
                                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-clock">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg></span><span
                                                            id="mainDate1"><?= tanggal_indo($empat[0]['tgl_berita'])?></span>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="back-trending-stories back-trending-stories-home2 back-trending-stories-home3">
                            <ul class="row">
                                <div class="thumbnail">
                                    <?php foreach($empat as $index => $thumbnail): ?>
                                    <li class="col-lg-3">
                                        <div class="image-areas">
                                            <a><img src="<?= base_url('img/berita/' . $thumbnail['gambar']); ?>"
                                                    style="width: 200px !important; height: 110px !important;"
                                                    alt="Thumbnail <?= $index; ?>"
                                                    data-large="<?= base_url('img/berita/' . $thumbnail['gambar']); ?>"
                                                    data-judul="<?= $thumbnail['judul']; ?>"
                                                    data-tgl_berita="<?= tanggal_indo($thumbnail['tgl_berita']); ?>"
                                                    data-kategori="<?= $thumbnail['nm_kategori_master']; ?>"
                                                    data-author="<?= $thumbnail['nama']; ?>"
                                                    data-url="<?= base_url('detail/' . url_title($thumbnail['tgl_berita'], 'dash', TRUE) . '/' . url_title($thumbnail['sub_judul'], 'dash', TRUE)) ?>">
                                            </a>
                                        </div>
                                        <div class="back-btm-content">
                                            <h3><a
                                                    href="<?= base_url('detail/' . url_title($thumbnail['tgl_berita'], 'dash', TRUE) . '/' . url_title($thumbnail['sub_judul'], 'dash', TRUE)) ?>"><?= $thumbnail['judul']; ?></a>
                                            </h3>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </div>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-40">
                        <ul class="back-hero-bottom back-hero-bottom2 back-hero-rights back-hero-bottom-home3">
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/post/17.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Lifestyle</a>
                                    <h3><a href="#">Heasellus sint ratebc boi earum morwo occaecat egestas</a></h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><span><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/author/1.jpg"
                                                    alt="image"></span><a href="#">by Jon Deo</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/post/6.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Sports</a>
                                    <h3><a href="#">Voluptatum mauris feugiat culpa repellat others</a></h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><span><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/author/2.jpg"
                                                    alt="image"></span><a href="#">by Jon Deo</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/post/16.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Technology</a>
                                    <h3><a href="#">Ante aperiam dictum facilis fuga habitant off</a></h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><span><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/author/3.jpg"
                                                    alt="image"></span><a href="#">by Jon Deo</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/post/8.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Travel</a>
                                    <h3><a href="#">Bnte aperiam dictum oi facilis fuga ewborna mentors</a></h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><span><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/author/1.jpg"
                                                    alt="image"></span><a href="#">by Jon Deo</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/post/9.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Food</a>
                                    <h3><a href="#">Tempore imperdiet rhoncus ipsam lobortis off others.</a></h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><span><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/author/1.jpg"
                                                    alt="image"></span><a href="#">by Jon Deo</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/post/11.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Lifestyle</a>
                                    <h3><a href="#">Occaecat egestas incididunt mauris lectus orking</a></h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><span><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/author/2.jpg"
                                                    alt="image"></span><a href="#">by Jon Deo</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="back-hero-area back-latest-posts back-whats-posts back-feature-posts back-feature-posts-latest back-live-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="back-title">
                            <h2>Berita Terbaru</h2>
                        </div>
                        <div class="back-trending-stories back-trending-stories-home2">
                            <div class="row">
                                <ul class="row">
                                    <li class="col-lg-6">
                                        <div class="image-areas">
                                            <a href="#"><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/latest-news/6.jpg"
                                                    alt="image"></a>
                                        </div>
                                        <div class="back-btm-content">
                                            <a href="#" class="back-cates">News</a>
                                            <h3><a href="#">COVID patient successfully given vaccine fully treatment our
                                                    board with a healthy</a></h3>
                                            <ul>
                                                <li class="back-author">by <a href="#">Jon Deo</a></li>
                                                <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-clock">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg></span>April 29, 2022</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-lg-6">
                                        <div class="image-areas">
                                            <a href="#"><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/trending/2.jpg"
                                                    alt="image"></a>
                                        </div>
                                        <div class="back-btm-content">
                                            <a href="#" class="back-cates">Travel</a>
                                            <h3><a href="#">Selective focus photography of orange fox life insurence
                                                    save a life no earth</a></h3>
                                            <ul>
                                                <li class="back-author">by <a href="#"> Jon Deo</a></li>
                                                <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-clock">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg></span>March 25, 2022</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="row">
                                    <li class="col-lg-4">
                                        <div class="image-areas">
                                            <a href="#"><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/latest-news/8.jpg"
                                                    alt="image"></a>
                                        </div>
                                        <div class="back-btm-content">
                                            <a href="#" class="back-cates">Sports</a>
                                            <h3><a href="#">tUNAI Android trending sneaker models give world cup
                                                    sibe</a></h3>
                                            <ul>
                                                <li class="back-author">by <a href="#"> Jon Deo</a></li>
                                                <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-clock">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg></span>May 29, 2022</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-lg-4">
                                        <div class="image-areas">
                                            <a href="#"><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/latest-news/7.jpg"
                                                    alt="image"></a>
                                        </div>
                                        <div class="back-btm-content">
                                            <a href="#" class="back-cates">Politics</a>
                                            <h3><a href="#">Treat your planet like you want to treat to our fimail
                                                    workers.</a></h3>
                                            <ul>
                                                <li class="back-author">by <a href="#"> Jon Deo</a></li>
                                                <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-clock">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg></span>June 20, 2022</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-lg-4">
                                        <div class="image-areas">
                                            <a href="#"><img
                                                    src="<?= base_url('template/frontend/assets/')?>assets/images/trending/5.jpg"
                                                    alt="image"></a>
                                        </div>
                                        <div class="back-btm-content">
                                            <a href="#" class="back-cates">Technology</a>
                                            <h3><a href="#">Virtual reality is here on leather by pink working world
                                                    mentor</a></h3>
                                            <ul>
                                                <li class="back-author">by <a href="#"> Jon Deo</a></li>
                                                <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-clock">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg></span>June 20, 2022</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-30">
                        <div class="back-title back-small-title">
                            <h2>Stay Connected</h2>
                        </div>
                        <ul class="social-area2">
                            <li>
                                <div><a href="#"><i class="fa-brands fa-facebook-f"></i></a> <span>Followers
                                        <em>750</em></span></div>
                            </li>
                            <li>
                                <div><a href="#"><i class="fa-brands fa-twitter"></i></a> <span>Fans
                                        <em>1236</em></span></div>
                            </li>
                            <li>
                                <div><a href="#"><i class="fa-brands fa-instagram"></i></a> <span>Likes
                                        <em>523</em></span></div>
                            </li>
                            <li>
                                <div><a href="#"><i class="fa-brands fa-vimeo-v"></i></a> <span>Comments
                                        <em>790</em></span></div>
                            </li>
                            <li>
                                <div><a href="#"><i class="fa-brands fa-linkedin-in"></i></a> <span>Followers
                                        <em>1025</em></span></div>
                            </li>
                            <li>
                                <div><a href="#"><i class="fa-brands fa-youtube"></i></a> <span>Subscribers
                                        <em>590M</em></span></div>
                            </li>
                        </ul>
                        <div class="back-title back-small-title pt-30">
                            <h2>Banyak Dibaca</h2>
                        </div>
                        <ul class="back-hero-bottom back-hero-bottom3">
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/read/1.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Politics</a>
                                    <h3><a href="#">Save the earth, save a life no earth, no life health.</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/read/2.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Technology</a>
                                    <h3><a href="#">That woman comes from heaven just for me working</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/read/11.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Politics</a>
                                    <h3><a href="#">Brighten up your day with solar amd eco power man</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/read/12.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">News</a>
                                    <h3><a href="#">Leveraging tech to drive a better IT experience others</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a href="#"><img
                                            src="<?= base_url('template/frontend/assets/')?>assets/images/read/5.jpg"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="#" class="back-cates">Lifestyle</a>
                                    <h3><a href="#">Green leaves photo plant the with cute girl modeling</a></h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="back-trading-video back-trading-video2">
            <div class="container">
                <div class="back-title">
                    <h2>Trading Video</h2>
                </div>
                <ul class="row">
                    <li class="col-lg-4">
                        <div class="image-area">
                            <a href="#"><img src="<?= base_url('template/frontend/assets/')?>assets/images/video/9.jpg"
                                    alt="image"></a>
                            <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="popup-videos back-video"><i
                                    class="fa-solid fa-play"></i></a>
                            <div class="back-btm-content">
                                <h3><a href="#">Mobile new carrier identity less orbit fbombs more 5G network</a></h3>
                                <ul>
                                    <li class="back-author"><span><img
                                                src="<?= base_url('template/frontend/assets/')?>assets/images/author/1.jpg"
                                                alt="image"></span><a href="#">by Jon Deo</a></li>
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></span>March 26, 2022</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4">
                        <div class="image-area">
                            <a href="#"><img src="<?= base_url('template/frontend/assets/')?>assets/images/video/7.jpg"
                                    alt="image"></a>
                            <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="popup-videos back-video"><i
                                    class="fa-solid fa-play"></i></a>
                            <div class="back-btm-content">
                                <h3><a href="#">Voluptates penatibus aspernatur lectus less orbit fbombs grav</a></h3>
                                <ul>
                                    <li class="back-author"><span><img
                                                src="<?= base_url('template/frontend/assets/')?>assets/images/author/1.jpg"
                                                alt="image"></span><a href="#">by Jon Deo</a></li>
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></span>March 26, 2022</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4">
                        <div class="image-area">
                            <a href="#"><img src="<?= base_url('template/frontend/assets/')?>assets/images/video/8.jpg"
                                    alt="image"></a>
                            <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="popup-videos back-video"><i
                                    class="fa-solid fa-play"></i></a>
                            <div class="back-btm-content">
                                <h3><a href="#">Bernie nonummy incididunt duisto perspic iatis eum litora</a></h3>
                                <ul>
                                    <li class="back-author"><span><img
                                                src="<?= base_url('template/frontend/assets/')?>assets/images/author/1.jpg"
                                                alt="image"></span><a href="#">by Jon Deo</a></li>
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></span>March 26, 2022</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-divider"></div>
    </div>
    <footer id="back-footer" class="back-footer">
        <?php $this->load->view('frontend/template/footer')?>
    </footer>

    <div id="backscrollUp">
        <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
    </div>
    <?php $this->load->view('frontend/template/js')?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.getElementsByClassName('thumbnail')[0].getElementsByTagName('img');
        const mainImage = document.getElementById('mainImage');
        const mainTitle = document.getElementById('mainTitle');
        const mainCategory = document.getElementById('mainCategory');
        const mainDatee = document.getElementById('mainDate1');
        const mainAuthor = document.getElementById('mainAuthor');
        let currentThumbnailIndex = 0;
        let timer;

        function selectThumbnail(index) {
            Array.from(thumbnails).forEach(img => img.classList.remove('active'));
            thumbnails[index].classList.add('active');
            mainImage.src = thumbnails[index].dataset.large;
            mainTitle.href = thumbnails[index].dataset.url;
            mainTitle.textContent = thumbnails[index].dataset.judul;
            mainCategory.textContent = thumbnails[index].dataset.kategori;
            mainDatee.textContent = thumbnails[index].dataset.tgl_berita;
            mainAuthor.textContent = `By ${thumbnails[index].dataset.author}`;
        }

        function autoSelectThumbnail() {
            currentThumbnailIndex = (currentThumbnailIndex + 1) % thumbnails.length;
            selectThumbnail(currentThumbnailIndex);
            resetTimer();
        }

        function resetTimer() {
            clearTimeout(timer);
            timer = setTimeout(autoSelectThumbnail, 5000);
        }
        selectThumbnail(currentThumbnailIndex);
        resetTimer();
        Array.from(thumbnails).forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', function() {
                currentThumbnailIndex = index;
                selectThumbnail(currentThumbnailIndex);
                resetTimer();
            });
        });
    });
    </script>

</body>

</html>
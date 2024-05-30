<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 md-mb-30">
                <div class="footer-widget footer-widget-1">
                    <div class="footer-logo white">
                        <a href="index.html" class="logo-text"> <img
                                src="<?= base_url('template/frontend/assets/') ?>assets/images/light-logo.png"
                                alt="logo"></a>
                    </div>
                    <!-- <h5 class="footer-subtitle">We have lots of courses and programs from the main market
                        experts.</h5> -->
                    <div class="footer-subtitle">
                        <p>
                            Jalan Trans Sulawesi <br />
                            Kabupaten Bolaang Mongondow Utara - Boroko : 95765 <br>
                            <br>
                            <i class="fas fa-phone "></i> &nbsp;&nbsp;0822-9671-5197 <br />
                            <i class="fas fa-envelope "></i> &nbsp;&nbsp;rifdhalriilmedia@gmail.com
                        </p>
                    </div>
                    <div class="container">
                        <div class="verified-container">
                            <img src="https://static.promediateknologi.id/promedia/news/desktop/images/icon-verify.svg?v=1"
                                alt="Verified" class="checkmark">
                            <div class="text-contentt">
                                <p class="titlee">Riiljejak</p>
                                <p class="verified-by">Telah Terdaftar di Kemenkumham</p>
                                <p class="certificate">Nomor <span class="number">AHU-0025205.AH.01.01.TAHUN 2024</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 md-mb-30">
                <div class="footer-widget footer-widget-2">
                    <h3 class="footer-title">Tags</h3>
                    <div class="footer-tag">
                        <ul>
                            <?php
                                $berita_tags =  $this->db->query("SELECT tag FROM tb_berita GROUP BY tag")->row_array();
                                ?>
                            <?php
                            
                            $tags = explode(',', $berita_tags['tag']);
                            foreach ($tags as $tag): ?>
                            <li><a href="<?= base_url(trim($tag))?>"><?= trim($tag) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 md-mb-30">
                <div class="footer-widget footer-widget-2">
                    <h3 class="footer-title">Kategori</h3>
                    <div class="footer-menu">
                        <ul>
                            <?php
                            $data = $this->db->query("SELECT id_kat_master, nm_kategori_master FROM tb_kategori_master ORDER BY id_kat_master ASC LIMIT 11 ")->result_array();
                            ?>
                            <?php foreach ($data as $row): ?>
                            <li><a
                                    href="<?= base_url('kategori/'.$row['id_kat_master'].'/'.$row['nm_kategori_master'])?>"><?= $row['nm_kategori_master'] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="back-copy-left">@2024 RIFDHAL RIIL MEDIA
        </div>
        <div class="back-copy-right">
            <ul>
                <li><a href="<?php echo base_url('tentang-kami') ?>">Tentang Kami</a></li>
                <li><a href="<?php echo base_url('redaksi') ?>">Redaksi</a></li>
                <!-- <li><a href="<?php echo base_url('tentang-kami') ?>">Info Iklan</a></li> -->
                <!-- <li><a href="<?php echo base_url('tentang-kami') ?>">Karir</a></li> -->
                <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                <li><a href="<?php echo base_url('pedoman-pemberitaan') ?>">Pedoman Media Siber</a></li>
                <li><a href="<?php echo base_url('privacy') ?>">Privacy</a></li>
            </ul>
        </div>
    </div>
</div>
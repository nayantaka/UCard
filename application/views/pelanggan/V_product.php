<style type="text/css">
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.875rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    #search {
        width: 300px;
    }

    #category {
        width: 300px;
    }

    @media only screen and (max-width: 600px) {
        #category {
            width: 100%;
        }

        #search {
            width: 100%;
        }
    }
</style>
<!-- Header -->

<!-- Page content -->
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header row m-0">
                    <div class="col">
                        <h3>Produk</h3>
                    </div>
                    <div class="col has-search">
                        <span class="ni ni-bullet-list-67 form-control-feedback"></span>
                        <select id="category" type="text" class="form-control" placeholder="Kategori">
                            <option value="0" selected>Pilih Kategori</option>
                            <?php foreach ($list_category as $c) : ?>
                                <option value="<?= $c['category_kode']; ?>"><?= $c['category_nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input id="search" type="text" class="form-control" placeholder="Search">
                    </div>
                </div>

                <!-- Light table -->
                <div class="card-body">
                    <div id="product" class="row">
                    </div>
                </div>
                <!-- Card footer -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#category').on('change', () => refresh_list());
            $('#search').on('keydown', () => refresh_list());

            function refresh_list() {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Product_pelanggan/search_product') ?>",
                    data: {
                        'keyword': $('#search').val(),
                        'category': $('#category').val()
                    },
                    success: function(data) {
                        $('#product').html(data);
                    }
                });
            }

            var flag = 0;
            $.ajax({
                type: "GET",
                url: "<?= base_url('Product_pelanggan/get_product') ?>",
                data: {
                    'offset': 0,
                    'limit': 20
                },
                success: function(data) {
                    $('#product').append(data);
                    flag += 20;
                }
            });
            $(window).scroll(function() {
                var position = $(window).scrollTop();
                var bottom = $(document).height() - $(window).height();
                if (position == bottom) {
                    $.ajax({
                        type: "GET",
                        url: "<?= base_url('Product_pelanggan/get_product') ?>",
                        data: {
                            'offset': flag,
                            'limit': 20
                        },
                        success: function(data) {
                            $('#product').append(data);
                            flag += 20;
                        }
                    });
                }
            });
        });
    </script>
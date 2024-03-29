<?php
    /**
     * Admin Tour Page 
     * last_update: 2019-09-04
     * Author: Ravi Patel, patel-r89@webmail.uwinnipeg.ca
     */
    
    require __DIR__ . '/../../app/atg_config.php';

    use App\TourModel;

    $title = 'ATG - Admin Archived Tours';
    $heading = 'Archived Tours';

    if(!$_SESSION['logged_in'] && $_SESSION['role'] != 'admin') {
        $_SESSION['flash'] = 'You must be logged in as admin
                                 to view admin archived tours page.';
        $_SESSION['flash_class'] = 'flash-info';
        header('Location: ../login.php?request_from=admin/archived_tours.php');
        exit;
    }

    $obj_tour = new TourModel;
    $tours = $obj_tour->allArchived();

    // including head file
    require '../../inc/admin_head.inc.php';
?>
        <?php require __DIR__ . '/../../inc/admin_flash.inc.php'; ?>
        <h1 class="dash-title"><?=esc($heading)?></h1>

        <div class="row">
            <div class="col">
                <div class="card spur-card">
                    <div class="card-header bg-secondary text-white">
                        <div class="spur-card-icon">
                            <i class="fas fa-table"></i>
                        </div>
                        <div class="spur-card-title">List of Archived Tours</div>
                    </div>
                    <div class="card-body card-body-with-dark-table">
                        <table class="table table-dark table-in-card" 
                            id="table_tours">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Booking Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sr_no = 1;
                                    foreach($tours as $tour):
                                ?>
                                    <tr>
                                        <th scope="row"><?=esc($sr_no)?></th>
                                        <td class="title">
                                            <?=esc($tour['title'])?>
                                            <img 
                                                src="../images/uploads/tours/thumbnail/<?=esc_attr($tour['thumbnail_image'])?>"
                                                class="img-fluid" 
                                                alt="<?=esc_attr($tour['thumbnail_image'])?>">
                                        </td>
                                        <td><?=esc($tour['category'])?></td>
                                        <td>
                                            <span class="badge badge-light">
                                                Country
                                            </span>
                                            <span class="badge badge-dark">
                                                <?=esc($tour['country'])?></span>
                                            <br />
                                            <span class="badge badge-light">
                                                From
                                            </span>
                                            <span class="badge badge-dark">
                                                <?=esc($tour['from_date'])?>
                                            </span>
                                            <br />
                                            <span class="badge badge-light">To</span>
                                            <span class="badge badge-dark"><?=esc($tour['to_date'])?></span>
                                            <br />
                                            <span class="badge badge-light">Price</span>
                                            <span class="badge badge-dark"><?=esc($tour['price'])?></span>
                                            <br />
                                            <span class="badge badge-light">Booking Ends</span>
                                            <span class="badge badge-dark"><?=esc($tour['booking_ends'])?></span>
                                            <br />
                                            <span class="badge badge-light">Max Allowed Booking</span>
                                            <span class="badge badge-dark"><?=esc($tour['max_allowed_bookings'])?></span>
                                        </td>
                                    </tr>
                                <?php
                                    $sr_no++;
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                        
<?php
    // including footer file
    require '../../inc/admin_footer.inc.php';
?>
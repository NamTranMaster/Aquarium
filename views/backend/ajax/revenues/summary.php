<div class="revenue-main-body grid">
    <div class="quick-info row">
        <div class="col-md-4">
            <div class="report_box alert-warning">
                <div class="icon">
                    <i class="fas fa-clock" style="color: #9ABC32;"></i>
                </div>
                <div class="content">
                    <h3 style="color: #9ABC32;"><b><?= $data['total_order'] ?? 0; ?></b> / <b><?= $data['total_quantityAll'] ?? 0; ?></b></h3>
                    <span class="text-center">Total order / Total quantity</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="report_box alert-info">
                <div class="icon">
                    <i class="fas fa-sync-alt" style="color: orange;"></i>
                </div>
                <div class="content">
                    <h3 style="color: orange;"><?= isset($data['total_moneyAll']) && $data['total_moneyAll'] > 0 ? '<b>' . $data['total_moneyAll'] . '</b>$' : 0 ?></h3>
                    <span class="text-center">Total sales</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="report_box alert-success">
                <div class="icon">
                    <i class="fas fa-tag" style="color: #2D98D0;"></i>
                </div>
                <div class="content">
                    <h3 style="color: #2D98D0;">0</h3>
                    <span class="text-center">Amount of discount</span>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="width: 3%;"></th>
                <th class="text-center" style="width: 5%;">STT</th>
                <th class="text-center">Order code</th>
                <th class="text-center">Customer name</th>
                <th class="text-center">Method of payments</th>
                <th class="text-center">Order date</th>
                <th class="text-center">Total quantity</th>
                <th class="text-center">Total money</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
        <tbody id="order-body" class="setting_tbody">
            <?php
            if (!empty($data['orders'])) :
                $i = 0;
                foreach ($data['orders'] as $value) :
                    $i++;
                    $stt = $i + (($paging_revenue->page - 1) * $paging_revenue->limit);
                    $s = $value['status'] ?? 0; ?>
                    <tr style="background-color: #FaFaFa;" class="ord-tr_item">
                        <td class="text-center"><i style="color: #478fca!important;" title="Order detail" onclick="toggle_detail_order(<?= $stt ?? $i; ?>)" class="fa fa-plus-circle i-detail-order-<?= $stt ?? $i; ?>"></i></td>
                        <td class="text-center"><?= $stt ?? $i; ?></td>
                        <td class="text-center"><button onclick="show_detail_order(<?= $value['id']?>, '.revenue_container', 1);" class="btn btn-default cus_btn-name"><?= $value['order_code'] ?? ''; ?></button></td>
                        <td class="text-center"><?= $value['cus_name'] ?? ''; ?></td>
                        <td class="text-center"><?= $value['method_name'] ?? ''; ?></td>
                        <td class="text-center"><?= date_format(date_create($value['order_date']), 'H:i d/m/Y') ?? ''; ?></td>
                        <td class="text-center"><?= $value['total_quantity'] ?? ''; ?></td>
                        <td class="text-center"><?= isset($value['total_money']) ? $value['total_money'] . '$' : ''; ?></td>
                        <td class="text-center" style="font-weight: 600;">
                            <?= $s == 0 ? 'Cancel' : ($s == 1 ? 'Unprocessed' : ($s == 2 ? 'Processing' : ($s == 3 ? 'Complete' : 'Cancel <sup>A</sup>'))); ?>
                        </td>
                    </tr>
                    <tr id="tr-detail-order-<?= $stt ?? $i; ?>" class="no-bg" style="display: none;">
                        <td colspan="15" style="padding: 0.75rem;">
                            <div class="tabable">
                                <ul class="nav nav-tabs">
                                    <li class="cus_ord-title nav__active">
                                        <a data-toggle="tab">Order details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <div class="alert alert-success" style="display: flex; align-items: center; margin-bottom: 0;">
                                            <div>
                                                <i class="fa fa-cart-arrow-down"></i>
                                                <span>Number of products:&nbsp;</span>
                                                <span style="color: #3C763D;"><b><?= count($data['ord_detail'][$i - 1]); ?></b></span>
                                            </div>
                                            <div style="padding-left: 10px;">
                                                <i class="fa fa-dollar"></i>
                                                <span>Total money:&nbsp;</span>
                                                <span style="color: #3C763D;"><?= isset($value['total_money']) ? '<b>' . $value['total_money'] . '</b>$' : ''; ?></span>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-hover table-striped" style="margin-bottom: 0;">
                                            <thead>
                                                <tr style="background-color: #F9F9F9;">
                                                    <th class="text-center" style="width: 8%;">STT</th>
                                                    <th class="text-center" style="width: 12%;">Event code</th>
                                                    <th class="text-left">Event name</th>
                                                    <th class="text-center" style="width: 12%;">Type</th>
                                                    <th class="text-center" style="width: 12%;">Quantity</th>
                                                    <th class="text-center" style="width: 12%;">Price</th>
                                                    <th class="text-center" style="width: 12%;">Total money</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 0;
                                                foreach ($data['ord_detail'][$i - 1] as $val) :
                                                    $j++;
                                                ?>
                                                    <tr class="cus-tr_item-odr">
                                                        <td class="text-center"><?= $j ?? ''; ?></td>
                                                        <td class="text-center"><?= $val['event_code'] ?? '-'; ?></td>
                                                        <td class="text-left "><?= $val['event_name'] ?? ''; ?></td>
                                                        <td class="text-center">
                                                            <?= $val['type'] == 0 ? 'General': 'VIP'; ?>
                                                        </td>
                                                        <td class="text-center "><?= $val['number'] ?? ''; ?></td>
                                                        <td class="text-center"><?= isset($val['price']) ? $val['price'] . '$' : ''; ?></td>
                                                        <td class="text-center"><?= isset($val['total_money']) ? $val['total_money'] . '$' : ''; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="no-bg">
                    <td colspan="10">
                        <h6 class="text-center">No have data!</h6>
                    </td>
                </tr>
            <?php endif; ?>
            <tr class="no-bg">
                <td colspan="10" style="padding: 0;">
                    <div class="alert-info" style="padding: 12px;">
                    <?php if (isset($paging_revenue) && $paging_revenue->total_page > 1) : ?>
                        <div>
                            <?php $paging_revenue->getPage('ajax', 'revenue_page'); ?>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" name="" id="revenue_page" value="<?= $paging_revenue->page ?? 1; ?>">
                    </div>
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>
</div>
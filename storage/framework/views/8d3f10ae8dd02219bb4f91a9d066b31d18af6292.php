<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo e($invoice->name); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
        </style>
    </head>

    <body>
        
        <?php if($invoice->logo): ?>
            <img src="<?php echo e($invoice->getLogo()); ?>" alt="logo" height="100">
        <?php endif; ?>

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong><?php echo e($invoice->name); ?></strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                        <?php if($invoice->status): ?>
                            <h4 class="text-uppercase cool-gray">
                                <strong><?php echo e($invoice->status); ?></strong>
                            </h4>
                        <?php endif; ?>
                        <p><?php echo e(__('invoices::invoice.serial')); ?> <strong><?php echo e($invoice->getSerialNumber()); ?></strong></p>
                        <p><?php echo e(__('invoices::invoice.date')); ?>: <strong><?php echo e($invoice->getDate()); ?></strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%">
                        <?php echo e(__('invoices::invoice.seller')); ?>

                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header">
                        <?php echo e(__('invoices::invoice.buyer')); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        <?php if($invoice->seller->name): ?>
                            <p class="seller-name">
                                <strong><?php echo e($invoice->seller->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->address): ?>
                            <p class="seller-address">
                                <?php echo e(__('invoices::invoice.address')); ?>: <?php echo e($invoice->seller->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->code): ?>
                            <p class="seller-code">
                                <?php echo e(__('invoices::invoice.code')); ?>: <?php echo e($invoice->seller->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->vat): ?>
                            <p class="seller-vat">
                                <?php echo e(__('invoices::invoice.vat')); ?>: <?php echo e($invoice->seller->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->phone): ?>
                            <p class="seller-phone">
                                <?php echo e(__('invoices::invoice.phone')); ?>: <?php echo e($invoice->seller->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php $__currentLoopData = $invoice->seller->custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="seller-custom-field">
                                <?php echo e(ucfirst($key)); ?>: <?php echo e($value); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        <?php if($invoice->buyer->name): ?>
                            <p class="buyer-name">
                                <strong><?php echo e($invoice->buyer->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->address): ?>
                            <p class="buyer-address">
                                <?php echo e(__('invoices::invoice.address')); ?>: <?php echo e($invoice->buyer->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->code): ?>
                            <p class="buyer-code">
                                <?php echo e(__('invoices::invoice.code')); ?>: <?php echo e($invoice->buyer->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->vat): ?>
                            <p class="buyer-vat">
                                <?php echo e(__('invoices::invoice.vat')); ?>: <?php echo e($invoice->buyer->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->phone): ?>
                            <p class="buyer-phone">
                                <?php echo e(__('invoices::invoice.phone')); ?>: <?php echo e($invoice->buyer->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php $__currentLoopData = $invoice->buyer->custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="buyer-custom-field">
                                <?php echo e(ucfirst($key)); ?>: <?php echo e($value); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="table table-items">
            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0"><?php echo e(__('invoices::invoice.description')); ?></th>
                    <?php if($invoice->hasItemUnits): ?>
                        <th scope="col" class="text-center border-0"><?php echo e(__('invoices::invoice.units')); ?></th>
                    <?php endif; ?>
                    <th scope="col" class="text-center border-0"><?php echo e(__('invoices::invoice.quantity')); ?></th>
                    <th scope="col" class="text-right border-0"><?php echo e(__('invoices::invoice.price')); ?></th>
                    <?php if($invoice->hasItemDiscount): ?>
                        <th scope="col" class="text-right border-0"><?php echo e(__('invoices::invoice.discount')); ?></th>
                    <?php endif; ?>
                    <?php if($invoice->hasItemTax): ?>
                        <th scope="col" class="text-right border-0"><?php echo e(__('invoices::invoice.tax')); ?></th>
                    <?php endif; ?>
                    <th scope="col" class="text-right border-0 pr-0"><?php echo e(__('invoices::invoice.sub_total')); ?></th>
                </tr>
            </thead>
            <tbody>
                
                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="pl-0">
                        <?php echo e($item->title); ?>

                        <?php if($item->description): ?>
                            <p class="cool-gray"><?php echo e($item->description); ?></p>
                        <?php endif; ?>
                    </td>
                    <?php if($invoice->hasItemUnits): ?>
                        <td class="text-center"><?php echo e($item->units); ?></td>
                    <?php endif; ?>
                    <td class="text-center"><?php echo e($item->quantity); ?></td>
                    <td class="text-right">
                        <?php echo e($invoice->formatCurrency($item->price_per_unit)); ?>

                    </td>
                    <?php if($invoice->hasItemDiscount): ?>
                        <td class="text-right">
                            <?php echo e($invoice->formatCurrency($item->discount)); ?>

                        </td>
                    <?php endif; ?>
                    <?php if($invoice->hasItemTax): ?>
                        <td class="text-right">
                            <?php echo e($invoice->formatCurrency($item->tax)); ?>

                        </td>
                    <?php endif; ?>

                    <td class="text-right pr-0">
                        <?php echo e($invoice->formatCurrency($item->sub_total_price)); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($invoice->hasItemOrInvoiceDiscount()): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.total_discount')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->total_discount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->taxable_amount): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.taxable_amount')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->taxable_amount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->tax_rate): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.tax_rate')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->tax_rate); ?>%
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->hasItemOrInvoiceTax()): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.total_taxes')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->total_taxes)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->shipping_amount): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.shipping')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->shipping_amount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.total_amount')); ?></td>
                        <td class="text-right pr-0 total-amount">
                            <?php echo e($invoice->formatCurrency($invoice->total_amount)); ?>

                        </td>
                    </tr>
            </tbody>
        </table>

        <?php if($invoice->notes): ?>
            <p>
                <?php echo e(trans('invoices::invoice.notes')); ?>: <?php echo $invoice->notes; ?>

            </p>
        <?php endif; ?>

        <p>
            <?php echo e(trans('invoices::invoice.amount_in_words')); ?>: <?php echo e($invoice->getTotalAmountInWords()); ?>

        </p>
        <p>
            <?php echo e(trans('invoices::invoice.pay_until')); ?>: <?php echo e($invoice->getPayUntilDate()); ?>

        </p>

        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
    </body>
</html>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\vendor\invoices\templates\default.blade.php ENDPATH**/ ?>
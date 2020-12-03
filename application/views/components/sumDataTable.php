<table id="user_table" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Total Payments</th>
        <th>Total ($) Owed to CA</th>
        <th>Total ($) Outstanding Owed to CA</th>
        <th>Total ($) Owed by CA</th>
        <th>Total ($) Outstanding Owed by CA</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($data)): ?>
        <?php if (!empty($data['summary'])): ?>
        <?php foreach ($data['summary'] as $userData): ?>

            <tr>
                <td><?php echo $userData->totalPayments; ?></td>
                <td><?php echo $userData->totalOwed; ?></td>
                <td><?php echo $userData->totalOwedOutstanding; ?></td>
                <td><?php echo $userData->totalOwe; ?></td>
                <td><?php echo $userData->totalOweOutstanding; ?></td>
                

            </tr>

        <?php endforeach; ?>
        <?php endif;?>
    <?php endif; ?>
    </tbody>

</table>
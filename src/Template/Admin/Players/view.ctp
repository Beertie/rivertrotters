<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player'), ['action' => 'edit', $player->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams Has Players'), ['controller' => 'TeamsHasPlayers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teams Has Player'), ['controller' => 'TeamsHasPlayers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="players view large-9 medium-8 columns content">
    <h3><?= h($player->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($player->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($player->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= $this->Number->format($player->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($player->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($player->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Teams Has Players') ?></h4>
        <?php if (!empty($player->teams_has_players)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Team Id') ?></th>
                <th scope="col"><?= __('Player Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($player->teams_has_players as $teamsHasPlayers): ?>
            <tr>
                <td><?= h($teamsHasPlayers->team_id) ?></td>
                <td><?= h($teamsHasPlayers->player_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TeamsHasPlayers', 'action' => 'view', $teamsHasPlayers->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TeamsHasPlayers', 'action' => 'edit', $teamsHasPlayers->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeamsHasPlayers', 'action' => 'delete', $teamsHasPlayers->], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsHasPlayers->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<h1>Main::index</h1>

<ul>
    <?php foreach($posts['data'] as $post): ?>
    <li><?= $post->title;?></li>
    <?php endforeach; ?>
</ul>
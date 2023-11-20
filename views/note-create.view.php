<?php require('partials/header.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <div>
                <label for="body">Body</label>
                <div>
                    <textarea id="body" name="body"></textarea>
                </div>
            </div>
            <button>Submit</button>
        </form>
    </div>
</main>

<?php require('partials/footer.php') ?>
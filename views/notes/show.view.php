<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a
                class="text-blue-500 hover:underline"
                href="/notes"
            >Go Back...</a>
        </p>
        <!-- We need to sanitize the response so that we can prevent threat! eg of input: <script>alert('Hello There')</script> -->
        <p><?= htmlspecialchars($note['body']) ?></p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
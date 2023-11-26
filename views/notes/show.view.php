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

        <div class="mt-6 flex gap-x-4">
            <a
                href="/note/edit?id=<?= $_GET['id'] ?>"
            >
                <span class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Edit
                </span>
            </a>
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-red-500">Delete</button>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
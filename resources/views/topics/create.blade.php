@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form action="{{ route('store.topic') }}" method="POST">
    @csrf

    <div>
        <label for="name">Topic Name:</label>
        <input type="text" name="name" id="name">
    </div>

    <div id="subtopics">
        <div class="subtopic">
            <label for="subtopics[]">Subtopic Name:</label>
            <input type="text" name="subtopics[]" id="subtopics[]">
            <button type="button" class="remove-subtopic">Remove Subtopic</button>
            <div>
                <label for="descriptions[]">Description:</label>
                <textarea name="descriptions[]" id="descriptions[]"></textarea>
            </div>
        </div>

    </div>

    <button type="button" id="add-subtopic">Add Subtopic</button>
    <button type="submit">Create Topic</button>
</form>

<script>
    // Add a new subtopic field when the "Add Subtopic" button is clicked
    var addSubtopicButton = document.querySelector('#add-subtopic');
    addSubtopicButton.addEventListener('click', function() {
        var subtopicsContainer = document.querySelector('#subtopics');
        var subtopicTemplate = document.querySelector('.subtopic');

        var newSubtopic = subtopicTemplate.cloneNode(true);
        newSubtopic.querySelector('input').value = '';
        subtopicsContainer.appendChild(newSubtopic);
    });

    // Remove a subtopic field when the "Remove Subtopic" button is clicked
    var subtopicsContainer = document.querySelector('#subtopics');
    subtopicsContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-subtopic')) {
            event.target.closest('.subtopic').remove();
        }
    });
</script>

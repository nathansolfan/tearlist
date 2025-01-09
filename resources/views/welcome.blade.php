<script>
    function tierList(tasks) {
        return {
            tasks: tasks || [],
            progress: {},

            // Automatically called on component initialization
            init() {
                this.calculateProgress();
            },

            // Calculate progress based on task deadline
            calculateProgress() {
                this.tasks.forEach(task => {
                    const today = new Date().getTime();
                    const createdAt = new Date(task.created_at).getTime();
                    const deadline = new Date(task.deadline).getTime();

                    const totalTime = deadline - createdAt;
                    const elapsedTime = today - createdAt;

                    // Ensure progress is between 0% and 100%
                    const progressPercentage = Math.max(0, Math.min((elapsedTime / totalTime) * 100, 100));
                    this.progress[task.id] = progressPercentage;
                });
            },

            // Show a confirmation popup when a task is clicked
            showConfirmation(taskTitle) {
                alert(`Task: ${taskTitle}`);
            }
        };
    }

    // Initialize Alpine.js
    document.addEventListener('alpine:init', () => {
        Alpine.data('tierList', tierList);
    });
</script>

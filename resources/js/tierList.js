export default function tierList(tasks) {
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
                const today = new Date();
                const deadline = new Date(task.deadline);

                const totalTime = deadline - new Date(task.created_at);
                const elapsedTime = today - new Date(task.created_at);

                const progressPercentage = Math.min((elapsedTime / totalTime) * 100, 100);
                this.progress[task.id] = progressPercentage;
            });
        },

        // Show a confirmation popup when a task is clicked
        showConfirmation(taskTitle) {
            alert(`Task: ${taskTitle}`);
        }
    };
}

export default function tierList(tasks) {
    return {
        tasks: tasks || [],
        progress: {},

        // Init function to be called on page load
        init() {
            this.calculateProgress();
        },

        // Calculate task progress based on deadline
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

        // Optional: Show a confirmation popup
        showConfirmation(taskTitle) {
            alert(`Task: ${taskTitle}`);
        }
    };
}

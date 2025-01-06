export default function tierList(tasks){
    return {
        tasks: tasks || [],
        progress: {},

        init() {
            this.calculateProgress();
        },

        calculateProgress(){
            // loop
            this.tasks.forEach(task => {
                const today = new Date();
                const deadline = new Date(task.deadline);

            // total time to deadline
            const totalTime = deadline - new Date(task.created_at);
            // time passed from creation until today
            const elapsedTime = today - new Date(task.created_at);

            // calculate progress %
            const progressPercentage = Math.min( (elapsedTime / totalTime) * 100,100);
            this.progress[task.id] = progressPercentage;
            });
        }
    }

}

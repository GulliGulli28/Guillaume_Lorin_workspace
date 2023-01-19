#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/wait.h>

#define MAX_LINE 80 /* The maximum length of a command */
#define MAX_ARGS MAX_LINE/2 + 1

int main(void) {
    char *args[MAX_ARGS]; /* command line arguments */
    int should_run = 1; /* flag to determine when to exit program */

    while (should_run) {
        printf("osh>");
        fflush(stdout);

        char input[MAX_LINE];
        fgets(input, MAX_LINE, stdin);
        input[strlen(input) - 1] = '\0';
        
        // Parse command line arguments
        char *token = strtok(input, " ");
        int i = 0;
        while (token != NULL) {
            args[i++] = token;
            token = strtok(NULL, " ");
        }
        args[i] = NULL; // last element must be NULL

        pid_t pid = fork();
        if (pid == 0) {
            // Child process
            execvp(args[0], args);
            exit(0);
        } else if (pid > 0) {
            // Parent process
            wait(NULL);
        }
    }

    return 0;
}

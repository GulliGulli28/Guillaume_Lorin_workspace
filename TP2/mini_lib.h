#include <unistd.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <string.h>
#include <errno.h>
#include <sys/syscall.h>
#include <sys/stat.h>
#include <sys/dir.h>
#include <sys/types.h>
#include <fcntl.h>
#include <dirent.h>
#include <time.h>
#include <pwd.h>
#include <grp.h>

#define IOBUFFER_SIZE 2048



extern void *mini_calloc(int size_element, int number_element);
extern void mini_free(void *ptr);
extern void mini_exit();
extern void mini_printf(char* str);
extern int mini_scanf(char* buffer, int size_buffer);
extern int mini_strlen(char* s);
extern int mini_strcpy(char* s, char* d);
extern int mini_strcmp(char* s1, char* s2);
extern void mini_perror(char* message);
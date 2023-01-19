#include "mini_lib.h"
#include "partie2.c"


int main(int argc, char* argv[]) {
    mini_ls_l("/home/guillaumelorin/Bureau");
    mini_chmod("partie2", 666);
    mini_echo("coucou c'est moi");
    mini_cp("src.txt", "dst.txt");
    mini_quickdiff("src.txt", "dst.txt");
    mini_mkdir("folder");
    mini_mv("todeletesrc.txt","toreceve.txt");
    // if (argc < 2) {
    //     printf("Usage: %s file_to_read\n", argv[0]);
    //     return 1;
    // }

    // const char* file_path = "mini_bashrc.txt";
    // FILE* file = fopen(file_path, "r");
    // if (file == NULL) {
    //     perror("Error opening file");
    //     return 1;
    // }

    // char command[256];
    // while (fgets(command, sizeof(command), file) != NULL) {
    //     system(command);
    // }

    // fclose(file);
    return 0;
}

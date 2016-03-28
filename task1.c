#include<stdio.h>
#include<string.h>

main(){
char data[3][20],temp[1][20];
int n,i,k,j;

printf("Enter no. strings");
scanf("%d",&n);
getchar();
k=n;
for(i=0;i<n;i++){
gets(data[i]);
}


for(i=0;i<n;i++){
	for(j=0;j<k-1;j++){
		if(strlen(data[j]) > strlen(data[j+1]) ){	
		strcpy(temp[0],data[j]);
		strcpy(data[j],data[j+1]);
		strcpy(data[j+1],temp[0]); 	
	}
}
k=k-1;
}

for(i=0;i<n;i++){
puts(data[i]); 
}
}




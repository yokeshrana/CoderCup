#include<stdio.h>
#include<stdlib.h>
 int *array_left_rotation(int *a, int n, int k) {
    k=k%n;
    int *output=(int*)malloc(n*sizeof(int));
    int i=0;
int j;
    for( j=k;j<n;++j)
        {output[i]=a[j];++i;}
    for( j=0;j<k;++j)
        {output[i]=a[j];++i;}
    return output;
}

int main(){
    int n;
    int k;
    scanf("%d%d",&n,&k);
    int a[n];
int a_i;    
for( a_i = 0;a_i < n;a_i++){
        scanf("%d",& a[a_i]);
    }
    int  *output = array_left_rotation(a, n, k);
int i;    
for( i = 0; i < n;i++)
        printf("%d ",output[i]);
    printf("\n");
    return 0;
}
// resources/js/Pages/Show.jsx
export default function Show({ post }) {
    console.log(post); 
    return (
        <>
        <h1>Ini SHow ya</h1>
        <p>Tess </p>
            <h1>{post.title}</h1>
            <hr/>
            <p>{post.body}</p>
        </>
    )
}
